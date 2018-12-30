<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Employees Scope
    public function scopeEmployees ($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['translator', 'writer', 'user']);
        });
    }

    // Customers Scope
    public function scopeCustomers ($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->whereIn('name', ['translator', 'writer', 'user']);
        });
    }

    // Admins Scope
    public function scopeAdmins ($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->whereIn('name', ['superadministrator', 'administrator']);
        });
    }

    // Admin Scope
    public function scopeAdmin ($query)
    {
        return $query->whereRoleIs('administrator');
    }

    // Arbitrator Scope
    public function scopeArbitrator ($query)
    {
        return $query->whereRoleIs('arbitrator');
    }

    // Langage Checker Scope
    public function scopeLanguageChecker ($query)
    {
        return $query->whereRoleIs('language_checker');
    }

    // Technical Producer Scope
    public function scopeTechnicalProducer ($query)
    {
        return $query->whereRoleIs('technical_producer');
    }

    // Finance Scope
    public function scopeFinance ($query)
    {
        return $query->whereRoleIs('finance');
    }

    // print Scope
    public function scopePrint ($query)
    {
        return $query->whereRoleIs('print');
    }

    // Relations With Orders
    public function orders ()
    {
        return $this->hasMany('App\Order', 'user_id');
    }
}

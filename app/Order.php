<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;
use OwenIt\Auditing\Contracts\Auditable;

class Order extends Model implements Auditable
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;
    // use Tightenco\Parental\HasChildren;
    
    protected   $fillable = [
        'user_id', 'title', 'slug', 'description', 'files', 'category', 'accepted', 'customer_accepted', 'status', 'type', 'applicant_address', 'phone number', 'postal_code', 'cv', 'passport_img', 'photo', 'delivery_way', 'band_details', 'translated', 'contract_img', 'original_author', 'source_language'
    ];

    //  Relations With User
    public function user ()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // Relations With Comments
    public function comments ()
    {
        return $this->hasMany('App\Comment', 'order_id');
    }

    // New Order Scope
    public function scopeNewOrders ($query)
    {
        return $query->where('status', OrderStatus::newOrder);
    }

    // Administrator Orders Status Scope
    public function scopeAdministratorOrders ($query)
    {
        return $query->where('status', OrderStatus::Administrator);
    }

    // Arbitrator Orders Status Scope
    public function scopeArbitratorOrders ($query)
    {
        return $query
                ->where('status', OrderStatus::Arbitrator)
                ->where('accepted', 1);
    }

    // Language Checker Orders Status Scope
    public function scopeLanguageChecker ($query)
    {
        return $query
            ->where('status', OrderStatus::LanguageChecker)
            ->where('accepted', 1);
    }
    // Technical Producer Orders Status Scope
    public function scopeTechnicalProducer ($query)
    {
        return $query
                    ->where('status', OrderStatus::TechnicalProducer)
                    ->where('accepted', 1);
    }
    // Finance Orders Status Scope
    public function scopeFinance ($query)
    {
        return $query
                    ->where('status', OrderStatus::Finance)
                    ->where('accepted', 1);
    }
    // Print Orders Status Scope
    public function scopePrint ($query)
    {
        return $query
                ->where('status', OrderStatus::Print)
                ->where('accepted', 1);
    }

}

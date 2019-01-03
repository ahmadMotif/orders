<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //  Relations With Order
    public function order ()
    {
        return $this->belongsTo('App\Orer', 'order_id');
    }

    //  Relations With User
    public function user ()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

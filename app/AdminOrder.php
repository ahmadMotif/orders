<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class AdminOrder extends Order
{
    use \Tightenco\Parental\HasParent;

    public function impersonate($order) {
        
    }
}

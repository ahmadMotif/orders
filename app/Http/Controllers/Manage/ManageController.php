<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\User;
// use App\Order;

class ManageController extends Controller
{
    public function dashboard ()
    {
        return view('manage.dashboard');
    }
}

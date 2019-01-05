<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $employees = $user->hasRole([
            'superadministrator', 'administrator', 'language_checker', 'technical_producer', 'finance', 'arbitrator', 'print'
        ]);
        if ($employees) {
            // return view('manage.dashboard');
            return redirect()->route('manage.dashboard');
        }
        // TODO
        // Order::create(['user_id' => 9, 'title' => 'Order With Type', 'slug' => 'order-with-type']);
        return view('client.home');
    }
}

<?php

namespace App\Http\Controllers\Client;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewOrder;
use App\Notifications\CustomerAcceptProduction;
use \App\Enums\OrderStatus;
use App\User;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', \Auth()->user()->id)->latest()->get();
        // dump($orders); die();
        return view('client.orders.index')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'title' => 'required|max:255'
        ]);
        
        $files = $request->file('files');
        if($files) {
            $path = $files->store('public/storage');
        }
        
        $order = new Order();
        $order->title = $request->title;
        $order->user_id = \Auth()->user()->id;
        $order->slug = str_slug($request->title, '-');
        $order->description = $request->description;
        if($files) {
            $order->files =$path;
        } 
        $order->status = OrderStatus::Administrator;
        $order->save();

        $admins = User::admins()->get();
        Notification::send($admins, new NewOrder($order));
        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        return view('client.orders.show')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        return view('client.orders.edit')->withOrder($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateWith([
            'title' => 'required|max:255'
        ]);
        $order = Order::findOrFail($id);
        $order->title = $request->title;
        $order->user_id = \Auth()->user()->id;
        $order->slug = str_slug($request->title, '-');
        $order->description = $request->description;
        $order->customer_accepted = $request->customer_accepted;
        $order->save();

        $technical_producer = User::technicalProducer()->get();
        Notification::send($technical_producer, new CustomerAcceptProduction($order));

        // Notification::send($admins, new NewOrder($order));

        return redirect()->route('orders.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id)->first();
        $order->delete();
        return back();
    }
}

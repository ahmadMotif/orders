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
        // if($files) {
        //     $path = $files->store('public/storage');
        // }
        $path = $files ? $files->store('public/storage') : null;

        $contract_img = $request->file('contract_img');
        $contract_img_path = $contract_img ? $contract_img->store('public/storage') : null;

        $customer_photo = $request->file('photo');
        $customer_photo_path = $customer_photo ? $customer_photo->store('public/storage') :null;

        $customer_cv = $request->file('cv');
        $customer_cv_path = $customer_cv ? $customer_cv->store('public/storage') : null;

        $customer_passport_img = $request->file('passport_img');
        $customer_passport_img_path = $customer_passport_img ?$customer_passport_img->store('public/storage') : null;
        
        $order = new Order();
        $order->title = $request->title;
        $order->user_id = \Auth()->user()->id;
        $order->slug = str_slug($request->title, '-');
        $order->description = $request->description;
       
        $order->category = $request->category;
        $order->applicant_address = $request->applicant_address;
        $order->postal_code = $request->postal_code;
        $order->phone_number = $request->phone_number;
        $order->bank_details = $request->bank_details;
        $order->translated = $request->is_translated;
        $order->original_author = $request->original_author;
        $order->award_delivery_way = $request->award_delivery_way;
        $order->source_language = $request->source_language;
        $order->files =$path;
        $order->photo = $customer_photo_path;
        $order->cv = $customer_cv_path;
        $order->contract_img = $contract_img_path;
        $order->passport_img = $customer_passport_img_path;
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
        $audits = $order->audits;
        return view('client.orders.show')->with(['order' => $order, 'audits' => $audits]);
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
        $request->customer_accepted ? $request->customer_accepted : $order->customer_accepted;
        // $order->customer_accepted = $request->customer_accepted;
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

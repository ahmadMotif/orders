<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Order;
use App\User;
use App\Notifications\AdministratReport;
use App\Notifications\ArbitratorReport;
use App\Notifications\LanguageCheckerReport;
use App\Notifications\TechnicalProducerReport;
use App\Notifications\FinanceReport;
use \App\Enums\OrderStatus;
use App\Comment;

class CustomersOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $admin = User::admin()->first();
        //  Administrator Orders
        if(\Auth::user()->hasRole('administrator')) {
            $orders = Order::administratorOrders()->latest()->get();
        }
        //  Arbitrator Orders
        elseif (\Auth::user()->hasRole('arbitrator')) {
            $orders = Order::arbitratorOrders()->latest()->get();
        }
        //  Language Checker Orders
        elseif (\Auth::user()->hasRole('language_checker')) {
            $orders = Order::languageChecker()->latest()->get();
        }
        //  Technical Producer Orders
        elseif (\Auth::user()->hasRole('technical_producer')) {
            $orders = Order::technicalProducer()->latest()->get();
        }
        //  Finance Orders
        elseif (\Auth::user()->hasRole('finance')) {
            $orders = Order::finance()->latest()->get();
        }
        //  Print Orders
        elseif (\Auth::user()->hasRole('print')) {
            $orders = Order::print()->latest()->get();
        }
        else {
            $orders = Order::latest()->get();
        }
        return view('manage.customersOrders.index')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  Administrator Showing Order
        if(\Auth::user()->hasRole('administrator')) {
            $order = Order::administratorOrders()->where('id', $id)->with('user')->first();
        }
        //  Arbirator Showing Order
        elseif (\Auth::user()->hasRole('arbitrator')) {
            $order = Order::arbitratorOrders()->where('id', $id)->with('user')->first();
        }
        //  Language Checker Showing Order
        elseif (\Auth::user()->hasRole('language_checker')) {
            $order = Order::languageChecker()->where('id', $id)->with('user')->first();
        }
        //  Technical Prducer Showing Order
        elseif (\Auth::user()->hasRole('technical_producer')) {
            $order = Order::technicalProducer()->where('id', $id)->with('user')->first();
        }
        //  Finance Showing Order
        elseif (\Auth::user()->hasRole('finance')) {
            $order = Order::finance()->where('id', $id)->with('user')->first();
        }
        //  Print Showing Order
        elseif (\Auth::user()->hasRole('print')) {
            $order = Order::print()->where('id', $id)->with('user')->first();
        }
        $order = Order::where('id', $id)->with('user')->first();

        \Auth::user()->unreadNotifications()->update(['read_at' => now()]);
        return view('manage.customersOrders.show')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  Administrator Editing Order
        if(\Auth::user()->hasRole('administrator')) {
            $order = Order::administratorOrders()->where('id', $id)->with('user')->first();
        }
        //  Arbitrator Editing Order
        elseif (\Auth::user()->hasRole('arbitrator')) {
            $order = Order::arbitratorOrders()->where('id', $id)->with('user')->first();
        }
        //  Language Checker Editing Order
        elseif (\Auth::user()->hasRole('language_checker')) {
            $order = Order::languageChecker()->where('id', $id)->with('user')->first();
        }
        //  Tecnical Producer Editing Order
        elseif (\Auth::user()->hasRole('technical_producer')) {
            $order = Order::technicalProducer()->where('id', $id)->with('user')->first();
        }
        //  Finance Editing Order
        elseif (\Auth::user()->hasRole('finance')) {
            $order = Order::finance()->where('id', $id)->with('user')->first();
        }
        //  Print Editing Order
        elseif (\Auth::user()->hasRole('print')) {
            $order = Order::print()->where('id', $id)->with('user')->first();
        }
        $order = Order::where('id', $id)->with('user')->first();
        return view('manage.customersOrders.edit')->withOrder($order);
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
            'title' => 'required|max:255',
        ]);

        $files = $request->file('files');
        if($files) {
            $path = $files->store('public/storage');
        };
        $category = $request->category;
        $finished_at = $request->finished_at;
        $language_cheker_report = $request->language_cheker_report;
        $order_en_title = $request->order_en_title;
        $author_en_name = $request->author_en_name;
        $order_words_count = $request->order_words_count;
        $order_pages_count = $request->order_pages_count;
        $order_isbn = $request->order_isbn;
        $order_price = $request->price;
        $order_copies_count = $request->copies_count;
        $print_finance_accepted = $request->print_finance_accepted;
        $order_books_availability_store = $request->order_books_availability_store;
        $free_author_copies = $request->free_author_copies;

        
        $aritrator_decision = $request->file('aritrator_decision');
        if($aritrator_decision) {
            $aritrator_decision_path = $aritrator_decision->store('public/storage');
        }

        $order_producer_contract = $request->file('order_producer_contract');
        if($order_producer_contract) {
            $order_producer_contract_path = $order_producer_contract->store('public/storage');
        }

        $copyright = $request->file('copyright');
        if($copyright) {
            $copyright_path = $copyright->store('public/storage');
        }

        $award = $request->file('award');
        if($award) {
            $award_path = $award->store('public/storage');
        }

        $bank_transfer_receipt = $request->file('bank_transfer_receipt');
        if($bank_transfer_receipt) {
            $bank_transfer_receipt_path = $bank_transfer_receipt->store('public/storage');
        }

        $shipment_receipt = $request->file('shipment_receipt');
        if($shipment_receipt) {
            $shipment_receipt_path = $shipment_receipt->store('public/storage');
        }

        $order = Order::findOrFail($id);
        $order->title = $request->title;
        $order->accepted = $request->acceptable;
        $category ? ($order->category = $category) : $order->category;
        $finished_at ? ($order->finished_at = $finished_at) : $order->finished_at;
        $language_cheker_report ? ($order->language_cheker_report = $language_cheker_report) : $order->language_cheker_report;
        $order_en_title ? ($order->en_title = $order_en_title) : $order->en_title;
        $author_en_name ? ($order->en_author = $author_en_name) : $order->en_author;
        $order_words_count ? ($order->words_count = $order_words_count ) : $order->words_count;
        $order_pages_count ? ($order->pages_count = $order_pages_count ) : $order->pages_count;
        $order_isbn ? ($order->isbn = $order_isbn ) : $order->isbn;
        $order_price ? ($order->price = $order_price ) : $order->price;
        $order_copies_count ? ($order->copies_count = $order_copies_count ) : $order->copies_count;
        $print_finance_accepted ? $order->finance_accepted = $print_finance_accepted : $order->print_finance_accepted;
        $order_books_availability_store ? $order->order_books_availability_store= $order_books_availability_store : $order->order_books_availability_store;
        $free_author_copies ? ($order->free_author_copies = $free_author_copies ) : $order->free_author_copies;

        if($files) {
            $order->files =$path;
        }
        $aritrator_decision ? ($order->aritrator_decision = $aritrator_decision_path ) : $order->aritrator_decision;
        $order_producer_contract ? ($order->order_producer_contract = $order_producer_contract_path ) : $order->order_producer_contract;
        $copyright ? ($order->copyright = $copyright_path ) : $order->copyright;
        $award ? ($order->award = $award_path ) : $order->award;
        $bank_transfer_receipt ? ($order->bank_transfer_receipt = $bank_transfer_receipt_path ) : $order->bank_transfer_receipt;
        $shipment_receipt ? ($order->shipment_receipt = $shipment_receipt_path ) : $order->shipment_receipt;

        // Administrator Watching
        if(\Auth::user()->hasRole('administrator') && $order->status === OrderStatus::Administrator) {
            $order->status = OrderStatus::Arbitrator;
        }
        // Arbirator Watching
        if(\Auth::user()->hasRole('arbitrator') && $order->status === OrderStatus::Arbitrator) {
            $order->status = OrderStatus::LanguageChecker;
        }
        // Languag checker Watching
        if(\Auth::user()->hasRole('language_checker') && $order->status === OrderStatus::LanguageChecker) {
            $order->status = OrderStatus::TechnicalProducer;
            $order->accepted = 1;
        }
        // Technical Producer Watching
        if(\Auth::user()->hasRole('technical_producer') && $order->status === OrderStatus::TechnicalProducer) {
            $order->status = OrderStatus::Finance;
            $order->accepted = $request->acceptable;
        }
        // Finance Watching
        if(\Auth::user()->hasRole('finance') && $order->status === OrderStatus::Finance) {
            $order->status = OrderStatus::Print;
            $order->accepted = 1;
        }

        // Print Watching
        if(\Auth::user()->hasRole('print') && $order->status === OrderStatus::Print) {
            $order->status = OrderStatus::Print;
            $order->accepted = 1;
        }

        $order->save();

        // Adminstrator Report Notifications
        if(\Auth::user()->hasRole('administrator'))
        {
            $messageTo = $order->user()->first();
            if(!$request->acceptable) {
                $messageTo = $order->user()->first();
            }
            if($request->acceptable) {
                $arbitrators = User::arbitrator()->get();
                foreach($arbitrators as $arbitrator) {
                    Notification::send($arbitrator, new AdministratReport($order));
                }
            }
            Notification::send($messageTo, new AdministratReport($order));
        }

        // Arbitrator Report Notifications
        if(\Auth::user()->hasRole('arbitrator'))
        {
            $messageTo = $order->user()->first();
            if(!$request->acceptable) {
                $messageTo = $order->user()->first();
            }
            if($request->acceptable) {
                $languageCheckers = User::languageChecker()->get();
                foreach($languageCheckers as $languageChecker) {
                    Notification::send($languageChecker, new ArbitratorReport($order));
                }
            }
            Notification::send($messageTo, new ArbitratorReport($order));
        }

        // Language Checker Report Notifications
        if(\Auth::user()->hasRole('language_checker'))
        {
            $messageTo = $order->user()->first();
            $technicalProducers = User::technicalProducer()->get();
            foreach($technicalProducers as $technicalProducer) {
                Notification::send($technicalProducer, new LanguageCheckerReport($order));
            }
            Notification::send($messageTo, new LanguageCheckerReport($order));
        }

        // Technical Producer Report Notifications
        if(\Auth::user()->hasRole('technical_producer'))
        {
            if($order->customer_accepted ) {
                $messageTo = $order->user()->first();
                $finances = User::finance()->get();
                foreach($finances as $finance) {
                    Notification::send($finance, new TechnicalProducerReport($order));
                }
                Notification::send($messageTo, new TechnicalProducerReport($order));
            }
        }

        // Finance Report Notifications
        if(\Auth::user()->hasRole('finance'))
        {
            if($order->customer_accepted ) {
                $messageTo = $order->user()->first();
                $prints = User::print()->get();
                foreach($prints as $print) {
                    Notification::send($print, new FinanceReport($order));
                }
                Notification::send($messageTo, new FinanceReport($order));
            }
        }

        return redirect()->route('customers-orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

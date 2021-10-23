<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Orderdeital;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        return view('client.order.index',[
            'title' => 'مشخصات سفارشات شما',
            'orders' => Order::query()->where('user_id',$user_id)->get()
        ]);
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
    public function store(OrderRequest $request)
    {
        $order = Order::store_to_db($request->get('address'),$request->get('postcode'));
        $invoice = (new Invoice)->amount($order->price);
        return Payment::purchase($invoice,function($driver, $transactionId) use ($order) {
            $order->update([
                'transaction_id' => $transactionId
            ]);
        })->pay()->render();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('client.order.show',[
            'title' => 'مشخصات سفارشات من',
            'orderdeitals' => Orderdeital::query()->where('order_id',$order->id)->get(),
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function callback(Request $request){
        $order = Order::query()->where('transaction_id',$request->get('Authority'))->first();
        if($request->get('Status') == 'OK'){
            $order->update([
                'status' => 1
            ]);
        }
        return redirect(route('client.order.show',$order));

    }
}

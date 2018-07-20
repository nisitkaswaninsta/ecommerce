<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;
use App\Product;
use App\Transaction;
use App\User;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderproduct = OrderProduct::where('user_id',1)->first();
        $product = Product::find($orderproduct->product_id);
        $user = User::find($orderproduct->user_id);
        return view('orderproducts.index',compact('product','user'));
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
    public function store(Request $request,$id)
    { 
        $product = Product::find($id);
        $total = $product->price * $request->quantity;

        $orderproduct = new OrderProduct;
        $orderproduct->product_id = $product->id;
        $orderproduct->user_id = 1;
        $orderproduct->save();

       $orders = OrderProduct::all();
       $orders = $orders->last();

        // $transaction = new Transaction(['total_price' => $total]);
        $transaction = $orders->transactions()->create(['total_price'=>$total]);
        return "Success";
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderproduct = OrderProduct::find($id);
        $product = $orderproduct->products;
        $user = $orderproduct->users;
        return view('orderproducts.show',compact('product','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

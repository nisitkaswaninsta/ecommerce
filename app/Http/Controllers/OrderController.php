<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\OrderProduct;
use App\User;
use App\Product;
use App\Events\OrderConfirmed;
use App\Jobs\OrderConfirmedJob;
use App\OrderStoreTask;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = auth()->user();
        $order = new OrderStoreTask($user);
        $order->handle();
        return redirect()->route('products');
        
    }

    public function buynow(Request $request)
    {   
        $cart = auth()->user()->cart;
        $product = $cart->products->sortBy('created_at')->last();
        // $user = User::find(1);
        
        // $order = new Order;
        // $order->user_id = $user->id;
        // $order->save();

        $order = auth()->user()->orders()->create();

        
            
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity
            ]);
            
            $cart->products()->detach($product->id);
            // ->where('product_id', $product->id)->delete();

        
        return redirect()->route('products');
        
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

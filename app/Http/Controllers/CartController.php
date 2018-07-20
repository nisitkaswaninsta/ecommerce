<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('active',1)->where('user_id',1)->first();
        $products = $cart->products;
        //$price = $products->price;
        //$quantity = $products->pivot->quantity;
        $total = 0;
        foreach($products as $p ){
                $total = $total + ($p->price * $p->pivot->quantity);
            }
        return view('carts.index',compact('products','cart','total'));
        
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
    public function store(Request $request, $id)
    {
        $user = User::find(1);
        $quantity = $request->quantity;
        
        $cart = Cart::where('active',1)->where('user_id',$user->id)->first();
        
        if(!$cart){
        // $cart = new Cart;
        // $cart->user_id = $user->id;
        // $cart->save();
        $cart=$user->cart()->create();
        }

        $cart->products()->attach($id,['quantity'=>$quantity]);
        return 'Added Successfully to cart';
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

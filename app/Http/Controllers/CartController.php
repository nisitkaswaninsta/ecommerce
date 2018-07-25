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
        $cart = auth()->user()->cart;
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
        // $user = User::find(1);

        // $userId = auth()->user()->id;

        // $quantity = $request->quantity;
        
        // $cart = Cart::where('user_id',$user->id)->first();
        
        // if(!$cart){
        //     $cart=$user->cart()->create();
        // }

        $cart = auth()->user()->cart;
        
        $cart->products()->attach($id,[
            'quantity' => $request->quantity
        ]);

        return redirect()->back();
    }

    public function buynow(Request $request, $id)
    {
        // $user = User::find(1);

        // $userId = auth()->user()->id;

        // $quantity = $request->quantity;
        
        // $cart = Cart::where('user_id',$user->id)->first();
        
        // if(!$cart){
        //     $cart=$user->cart()->create();
        // }

        $cart = auth()->user()->cart;
        
        $cart->products()->attach($id,[
            'quantity' => $request->quantity
        ]);

        return redirect()->route('buynow',[$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = auth()->user()->cart;

        $product = $cart->products->sortBy('created_at')->last();
        
        $total = 0;
        
         $total = $total + ($product->price * $product->pivot->quantity);
        
        return view('carts.buynow',compact('product','cart','total'));
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

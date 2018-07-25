<?php
 namespace App;

 use Illuminate\Foundation\Auth\User;
 use App\Jobs\OrderConfirmedJob;


 class OrderStoreTask{

    public $cart,$products,$order;
     public function __construct(User $user)
     {
        $this->cart = $user->cart;
        $this->products = $this->cart->products;
        $this->order = $user->orders()->create();

       
    }


    public function handle(){
        foreach ($this->products as $product) {
            
            $this->order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity
            ]);
            
            $this->cart->products()->detach($product->id);
            // ->where('product_id', $product->id)->delete();
        }
        OrderConfirmedJob::dispatch($this->order);

            
    }

    
 }
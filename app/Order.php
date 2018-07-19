<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function transactions(){
        return $this->morphMany('App\Transaction','transactionable');
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }
}

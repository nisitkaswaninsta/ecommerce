<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    
    public function transactions(){
        return $this->morphMany('App\Transaction','transactionable');
    }
}

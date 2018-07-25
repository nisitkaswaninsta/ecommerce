<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded=['id'];
    public function cart(){
        return $this->belongsToMany('App\Cart')->withPivot('quantity');
    }

    public function orders(){
        return $this->belongsToMany('App\OrderProduct')->withTimestamps()->withPivot('quantity');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //CartDetails can to have one Cart
    public function user(){
        return $this->belongsTo(Cart::class);
    }

    //CartDetail can to have one Produc
    public function product(){
        return $this->belongsTo(Produc::class);
    }
}

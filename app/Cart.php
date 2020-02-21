<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //Cart can belongs only to one user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //one Cart can to have many CartDetails
    public function cartDetail(){
        return $this->hasMany(CartDetail::class);
    }
}

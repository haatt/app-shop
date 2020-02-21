<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //category -> products
    public function product(){
        return $this->hasMany(Produc::class);
    }
}

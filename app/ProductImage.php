<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //image->product
    public function product(){
        return $this->belongsTo(Produc::class);
    }

    public function getUrlAttribute(){
        if(substr($this->image, 0,4)=== 'http'){
            return $this->image;
        }else return '/images/products/'.$this->image;
    }
}

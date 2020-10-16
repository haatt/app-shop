<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //one User can to have lots of Cart
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function getCartAttribute(){
        $cart = Cart::where('user_id', auth()->user()->id )->where('status', 'active')->first();
        if($cart){
            return $cart;
        }else{
            $cart = new Cart();

            $cart->status = "active";
            $cart->user_id = auth()->user()->id;
            $cart->save();
            
            return $cart;
        }
    }
}

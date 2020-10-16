<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update(){

        $cart = auth()->user()->cart;
        $cart->status = 'bought';
        $cart->save();

        if($cart)
            $message = "Tu carrito se ha guardado correctamente";
        else
            $message = "Algo salio mal";
        
        return back()->with(compact('message'));
    }
}

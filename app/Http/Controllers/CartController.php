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

        $message = $cart->status;
        return back()->with(compact('message'));
    }
}

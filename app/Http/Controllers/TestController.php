<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produc;

class TestController extends Controller
{
    public function welcome(){
        $products = Produc::paginate(50);
        return view('welcome')->with(compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produc;
use App\CartDetail;

class CartDetailController extends Controller
{
    //add new products from the store
    public function store(Request $request){

        $description = ([
            "idProduc.required" => "Pleace do not move the HTML parameters"
        ]);

        $validations = ([
            "idProduc" => "numeric|required",
            "producCant" => "required|numeric|min:0"
        ]);

        $this->validate($request,$validations,$description);
        $cartDet = CartDetail::where('cart_id',auth()->user()->Cart->id)->where('product_id',$request->idProduc)->first();
        
        $message = "Added to your shopping cart";

        if($cartDet && $request->producCant >= 1){
            $cartDet->cuantity = ($cartDet->cuantity + $request->producCant);
            //$cartDet->selling_price = Produc::where('id',$request->idProduc)->first()->selling_price;
            $cartDet->save();
        }elseif($request->producCant >= 1){
            $cartDet = new CartDetail();
            $cartDet->product_id = $request->idProduc;
            $cartDet->cuantity = $request->producCant;
            //$cartDet->selling_price = Produc::where('id',$request->idProduc)->first()->selling_price;
            $cartDet->cart_id = auth()->user()->Cart->id;
            $cartDet->save();
        }else $message = "Something was wrong";

        return back()->with(compact('message'));
    }

    public function destroy(Request $request){

        $cartDet = CartDetail::where('id',$request->idCart)->first();
        $message = "Something was wrong";
        
        if($cartDet->cart_id == auth()->user()->Cart->id){
            $cartDet->delete();
            $message = "Deleted item";
        }
        return back()->with(compact('message'));
    }

    public function add(Request $request){
        $cartDet = CartDetail::where('id',$request->idCartDet)->first();

        $message = "Something was wrong";

        if($cartDet->cart_id == auth()->user()->Cart->id){
            if($cartDet){
                if($request->addone == 1){
                    $cartDet->cuantity++;
                    $cartDet->save();
                    $message = "Product added";
                }elseif($request->removeone == -1 && ($cartDet->cuantity - 1) >= 1){
                    $cartDet->cuantity--;
                    $cartDet->save();
                    $message = "Product deleted";
                }
            }
        }

        return back()->with(compact('message'));
    }
}

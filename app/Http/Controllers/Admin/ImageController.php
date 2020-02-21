<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produc;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id){

        $myProducts = Produc::find($id);
        $images = $myProducts->images()->orderBy('featured','desc')->orderBy('id')->get();

        return view('admin.products.images.index')->with(compact('myProducts','images'));
    }

    public function store(Request $request, $id){
        
        $file = $request->file('image');
        $rute = public_path().'/images/products';
        $nameImg = uniqid().$file->getClientOriginalName();
        $moved = $file->move($rute,$nameImg);
        
        if($moved){
            $img = new ProductImage();
            $img->image = $nameImg;
            $img->produc_id = $id;
            $img->save();
        }

        return back();
    }

    public function destroy(Request $request){

        $img = ProductImage::find($request->imgId);
        
        if(substr($img->image,0,4)==='http'){
            $delete = true;
        }else{
            $fullPath = public_path().'/images/products/'.$img->image;
            $delete = File::delete($fullPath);
        }

        if($delete){
            $img->delete();
        }

        return back();
    }

    public function select($id,$idImage){
        ProductImage::where('produc_id','=',$id)->update([
            'featured' => false
        ]);

        $setImg = ProductImage::find($idImage);
        $setImg->featured = true;
        $setImg->save();

        return back();
    }
}

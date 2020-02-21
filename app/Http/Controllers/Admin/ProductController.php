<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produc;

class ProductController extends Controller
{
    public function cIndex(){
        $myProducts = Produc::paginate(10);
        //return view('admin.products.index');//vista de listado
        return view('admin.products.index')->with(compact('myProducts'));
    }

    public function cCreate(){
        return view('admin.products.create');//vista de formulario
    }

    public function cStore(Request $formData){//agregar productos
/*
        $formData->validate([
            'name' => 'required|min:2|max:191',
            'description' => 'required|min:30|max:191',
            'selling_price' => 'required|min:0|numeric',
            

        ]);
*/
        $errorsDesc=[
            'name.required' => "The name field is required",
            'selling_price.required' => 'The price field is required',
            'selling_price.min' => 'The price field must be at last 0',
        ];

        $validations = ([
            'name' => 'required|min:2|max:191',
            'description' => 'required|min:30|max:191',
            'selling_price' => 'required|min:0|numeric',
        ]);

        $this->validate($formData,$validations,$errorsDesc);

        $tableProduct = new Produc();

        $tableProduct->name = $formData -> input('name');
        $tableProduct->description = $formData -> input('description');
        $tableProduct->long_description = $formData-> input('long_description');
        $tableProduct->selling_price = $formData->input('selling_price');
        //$tableProduct->category_id = $formData->input('category_id');

        $tableProduct->save();

        return redirect('/admin/products/create');
    }

    public function edit($id){
        $product = Produc::find($id);
        return view('admin.products.edit')->with(compact('product'));//envia a vista el producto a editar
    }

    public function update(Request $req, $id){//editar productos

        $errorsDesc=[
            'name.required' => "The name field is required",
            'selling_price.required' => 'The price field is required',
            'selling_price.min' => 'The price field must be at last 0',
        ];

        $validations = ([
            'name' => 'required|min:2|max:191',
            'description' => 'required|min:30|max:191',
            'selling_price' => 'required|min:0|numeric',
        ]);
        
        $this->validate($req,$validations,$errorsDesc);

        $product = Produc::find($id);

        $product->name = $req->input('name');
        $product->description = $req->input('description');
        $product->long_description = $req->input('long_description');
        $product->selling_price = $req->input('selling_price');
        //$product->category_id = $req->input('category_id');
        $product->save();

        //return redirect('/admin/products/'.$id.'/edit');
        return back();
    }

    public function destroy($id){
        $product = Produc::find($id);
        $product->delete();
        return back();
    }
}

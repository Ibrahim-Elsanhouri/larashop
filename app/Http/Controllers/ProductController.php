<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all(); 
        return view('admin.products.index',compact('products'));

    }
    public function create(){
        return view('admin.products.create');
    }
    public function store(Request $request){
      // validate the feilds 
       $request->validate([
'name' => 'required' , 
'details' => 'required' , 
'price' => 'required' , 
'image' => 'image|required' , 

       ]); 
        // upload the image 
        if ($request->hasFile('image')){
            $image = $request->image; 
            $image->move('uploads' , $image->getClientOriginalName());
        }
        //store the product 
        $product = new Product(); 
        $product->name = $request->name; 
        $product->details = $request->details; 
        $product->price = $request->price;
        $product->image = $request->image->getClientOriginalName(); 
        $product->save(); 
        return redirect('/products')->with('msg' , 'Product has been added Successfully'); 

        // return
    }
    public function show($id){
$product = Product::find($id); 
return view('admin.products.view' , compact('product')); 
    }
    public function edit($id){
$product = Product::find($id);
return view('admin.products.edit' , compact('product'));        

    }

    public function update(Request $request , $id){
$product = Product::find($id); 
$product->name = $request->name; 
$product->details = $request->details; 
$product->price = $request->price;
$product->save(); 
return redirect('/products')->with('msg' , 'Product has been Updated Successfully'); 

    }
    public function destroy($id){
       Product::destroy($id); 
    
        return redirect('/products')->with('msg' , 'Product has been Deleted Successfully'); 
        
            }
}

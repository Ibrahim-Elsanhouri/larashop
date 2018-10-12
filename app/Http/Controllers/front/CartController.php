<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function index(){
        return view ('front.cart.index');
    }

    public function store(Request $request){
        $dubl = Cart::instance('default')->search(function ($cartItem , $rowId) use ($request){
            return $cartItem->id === $request->id; 
        }); 
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg','Item already has been in your cart');
        }
        Cart::add($request->id , $request->name , 1 ,  $request->price)->associate('App\Product');
        return redirect()->back()->with('msg' , 'Item has been added to your Cart'); 
    
    }
    public function remove($id){
Cart::remove($id);
return redirect()->back()->with('msg','Item has been removed');
    }

    public function savelater($id){

        $item = Cart::get($id);
        $dubl = Cart::instance('SaveForLater')->search(function ($cartItem , $rowId) use ($id){
            return $cartItem->id === $id; 
        }); 
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg','Item already has been  Saved For Later');
        }
        Cart::instance('default')->remove($id);
        Cart::instance('saveForLater')->add($item->id , $item->name , 1 , $item->price)->associate('App\Product');
        return redirect()->back()->with('msg','Item  has been  Saved For Later');

    }
}

<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveforlaterController extends Controller
{

    public function destroy($id){
        Cart::instance('saveForLater')->remove($id);
        return redirect()->back()->with('msg','Item  has been  Removed from Save for later list');

    }
    public function moveToCart($id){
$item = Cart::instance('saveForLater')->get($id);
$dubl = Cart::instance('default')->search(function ($cartItem , $rowId ) use ($id){
return $cartItem === $id; 
}); 
if ($dubl->isNotEmpty()){
    return redirect()->back()->with('msg','Item is already in your Cart  ');
}
Cart::instance('saveForLater')->remove($id); 
Cart::instance('default')->add($item->id , $item->name , 1 , $item->price)->associate('App\Product');
return redirect()->back()->with('msg','Item is Moved to  your Cart  ');

    }
}

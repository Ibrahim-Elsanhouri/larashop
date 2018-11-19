<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe; 
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //
    public function index(){
        return view('front.checkout.index');
    }
    public function store (Request $request){
       try{
           Stripe::charges()->create([
'amount' => Cart::total(), 
'currency'=> 'USD' , 
'source' => $request->stripeToken , 
'description' =>  'Some Text',
'metadata' => [
    // 'contents' => $contents , 
    // 'quantity' => Cart::instance('default')->count()
] 
           ]); 
           return redirect()->back()->with('msg', 'Success , Thanks');
       }catch(Exception $e){

       }
    }
}
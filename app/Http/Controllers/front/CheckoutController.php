<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe; 
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order; 
use App\OrderItems; 
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index(){
        return view('front.checkout.index');
    }
    public function store (Request $request){
    $contents = Cart::instance('default')->content()->map(function($item){
return $item->model->name . '' . $item->model->qty;
    })->values()->toJson();
       try{
           Stripe::charges()->create([
'amount' => Cart::total(), 
'currency'=> 'USD' , 
'source' => $request->stripeToken , 
'description' =>  'Some Text',
'metadata' => [
    'contents' => $contents , 
    'quantity' => Cart::instance('default')->count()
] 
           ]); 
           $order = new Order();
           $order->address = $request->address; 
           $order->status = '0'; 
           $order->created_at = Carbon::now(); 
           $order->user_id = Auth::user()->id; 
           $order->save() ; 
           foreach (Cart::instance('default')->content() as $item)
       
           {
               $orderitems = new OrderItems();
               $orderitems->order_id = $order->id; 
               $orderitems->product_id = $item->model->id; 
               $orderitems->qty = $item->qty; 
               $orderitems->price = $item->price ; 
$orderitems->save(); 
           } 

           Cart::instance('default')->destroy();
           return redirect('/')->with('msg', 'Success Payment  , Thanks');
       }catch(Exception $e){

       }
    }
}
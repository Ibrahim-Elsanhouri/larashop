<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order; 
use App\Product; 


use App\User; 
class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::all(); 
        return view('admin.orders.index' , compact('orders')); 
    }
    public function show($id){
        $order = Order::find($id);
        return view('admin.orders.details' , compact('order')); 


    }
    public function destroy($id){
Order::destroy($id);
return redirect('/orders')->with('msg' ,'Order has Been Deleted Successfuly'); 
    }
    public function confirm($id){
$order = Order::find($id);
$order->status = 1 ; 
$order->save(); 
return redirect('/orders')->with('msg' ,'Order has Been Confirmed Successfuly'); 

    }
    public function pending($id){
        $order = Order::find($id);
$order->status = 0 ; 
$order->save(); 
return redirect('/orders')->with('msg' ,'Order has Been Pending Successfuly');
    }
}

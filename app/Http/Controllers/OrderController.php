<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order; 
use App\Product; 
use Illuminate\Support\Facades\Auth;


use App\User; 
class OrderController extends Controller
{
    //
    public function index(){
        if(Auth::check() && Auth::user()->admin){

        $orders = Order::all(); 
        return view('admin.orders.index' , compact('orders'));
        }
return redirect('/home')->with('bugs' , 'Sorry , You are not allowed to access this Critical Area');

    }
    public function show($id){
        if(Auth::check() && Auth::user()->admin){
        $order = Order::find($id);
        return view('admin.orders.details' , compact('order')); 
        }
        return redirect('/home')->with('bugs' , 'Sorry , You are not allowed to access this Critical Area');


    }
    public function destroy($id){
Order::destroy($id);
return redirect('/admin/orders')->with('msg' ,'Order has Been Deleted Successfuly'); 
    }
    public function confirm($id){
$order = Order::find($id);
$order->status = 1 ; 
$order->save(); 
return redirect('/admin/orders')->with('msg' ,'Order has Been Confirmed Successfuly'); 

    }
    public function pending($id){
        $order = Order::find($id);
$order->status = 0 ; 
$order->save(); 
return redirect('/admin/orders')->with('msg' ,'Order has Been Pending Successfuly');
    }
}

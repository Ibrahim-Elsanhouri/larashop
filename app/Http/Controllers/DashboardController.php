<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Order; 
use App\User; 
class DashboardController extends Controller
{
    //
   public function index(){
       $products = Product::all(); 
       $users = User::all(); 
       $orders = Order::all(); 
return view('admin.dashboard' , compact('products' , 'users' , 'orders'));
    }
}

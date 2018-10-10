<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Order; 
use App\User; 
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
   public function index(){
    if(Auth::check() && Auth::user()->admin){

        $products = Product::all(); 
        $users = User::all(); 
        $orders = Order::all(); 
 return view('admin.dashboard' , compact('products' , 'users' , 'orders'));
    }
return redirect('/home')->with('bugs' , 'Sorry , You are not allowed to access this Critical Area');
    }
}

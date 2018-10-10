<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use App\Product; 
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::inRandomOrder()->take(4)->get();
return view('front.index' , compact('products'));
    }
}

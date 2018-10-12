@extends('front.layouts.masterf')
@section('content')
<!-- Page Content -->
<div class="container">
@if (session()->has('msg'))
<div class="alert alert-success">
{{ session()->get('msg')}}
</div>
@endif
@if (session()->has('bugs'))
<div class="alert alert-danger">
{{ session()->get('bugs')}}
</div>
@endif
    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
    <hr>

    <h4 class="mt-5">{{ Cart::instance('default')->count() }} items(s) in Shopping Cart</h4>

    <div class="cart-items">
        
        <div class="row">
            
            <div class="col-md-12">
                
                <table class="table">
                    
                    <tbody>
        @foreach(Cart::instance('default')->content() as $item)                
                        <tr>
                            <td><img src="{{ url('uploads').'/'.$item->model->image}}" style="width: 5em"></td>
                            <td>
                                <strong>{{$item->model->name}}</strong><br>{{$item->model->details}}
                            </td>
                            
                            <td>
        
        <form method="post" action="{{ route('cart.remove', $item->rowId) }}" >
        {{ csrf_field()}}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger">Remove</button>
        </form>
                               <br>
                               <a href="{{ route('cart.savelater' , $item->rowId) }}" class="btn btn-primary">Save for Later</a>

                            </td>
                            
                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>
                            
                            <td>${{$item->model->price}}</td>
                        </tr>
@endforeach
                
                    </tbody>

                </table>

            </div>   
            <!-- Price Details -->
                <div class="col-md-6">
                        <div class="sub-total">
                             <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td>Subtotal </td>
                                        <td>${{ Cart::subtotal() }} </td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>${{ Cart::tax() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>${{ Cart::total() }}</th>
                                    </tr>
                             </table>           
                         </div>
                    </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="/checkout" class="btn btn-outline-info">Proceed to checkout</a>
                <hr>

                </div>

                <div class="col-md-12">
                
                <h4>{{ Cart::instance('saveForLater')->count() }} items Save for Later</h4>
                <table class="table">
                    
                    <tbody>
                        
                    
                     @foreach(Cart::instance('saveForLater')->content() as $item)

                        <tr>
                            <td><img src="{{ url('uploads').'/'.$item->model->image}}" style="width: 5em"></td>
                            <td>
                                <strong>{{ $item->model->name}}</strong><br> {{$item->model->details}}
                            </td>
                            
                            <td>
                            <form method="post" action="{{ route('savelater.destroy', $item->rowId ) }}" >
        {{ csrf_field()}}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger">Remove</button>
        </form><br>

                                <a href="{{ route('moveToCart' , $item->rowId )}}" class="btn btn-primary">Move to Cart </a>

                            </td>
                            
                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>
                            
                            <td>${{$item->model->price}}</td>
                        </tr>

                   
@endforeach
                    </tbody>

                </table>

            </div>  
                </div>


            </div>
        </div>
<!-- /.container -->
@endsection
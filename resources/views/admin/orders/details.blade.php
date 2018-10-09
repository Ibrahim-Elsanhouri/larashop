@extends('admin.layouts.master')

@section('page')
    Order Details
@endsection


@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Order Details</h4>
                    <p class="category">Order details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td>{{$order->id}} </td>
                                <td>{{$order->created_at }} </td>
                                <td>{{$order->address}}</td>
                          
                                <td>
                                        @if($order->status)
                                        <span class="label label-success">Confirmed</span>
                                        @else
                                        <span class="label label-danger">Pending</span>

                                        @endif
                                        </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Details</h4>
                    <p class="category">User Details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <td>{{ $order->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $order->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->user->email}}</td>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <td> {{$order->user->created_at->diffForHumans()}}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Details</h4>
                    <p class="category">Product Details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{ $order->id}}</td>
                            <td>
                                    <table class="table">
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                            </td>

                            <td>
                                    <table class="table">
                                    @foreach ($order->products as $product)

                                        <tr>
                                            <td>{{ $product->price}}</td>
                                        </tr>
                                        @endforeach

                                    </table>
                            </td>
                            <td>
                                    <table class="table">
                                    @foreach ($order->OrderItems as $items)

                                        <tr>
                                            <td>{{$items->qty}}</td>
                                        </tr>
                                        @endforeach

                                    </table>
                            </td>
                            <td>
                                    <table class="table">
                                    @foreach ($order->products as $product)

                                        <tr>
                                            <td><img src="{{ url('uploads') . '/' . $product->image }}" alt="" style="width: 2em"></td>
                                        </tr>
                                        @endforeach

                                    </table>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/admin/orders') }}" class="btn btn-success">Back to Orders</a>
    
@endsection
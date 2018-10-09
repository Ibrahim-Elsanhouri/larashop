@extends('admin.layouts.master')
@section('content')  
<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders</h4>
                                <p class="category">List of all orders</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                    <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>hh</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                        <table>
                                        @foreach($order->products as $product)
                                        <tr>
<td>{{ $product->name }}</td>
                                        </tr>
                                        @endforeach
                                        </table>
                                        </td>

         <td>
                                        <table>
                                        @foreach($order->OrderItems as $item)
                                        <tr>
<td>{{ $item->qty }}</td>
                                        </tr>
                                        @endforeach
                                        </table>
                                        </td>



                                        <td>
                                        @if($order->status)
                                        <span class="label label-success">Confirmed</span>
                                        @else
                                        <span class="label label-danger">Pending</span>

                                        @endif
                                        </td>
                                        <td>
                                        @if($order->status)

                                            <a href="{{ route('orders.pending' , $order->id) }}" class="btn btn-sm btn-danger"
                                                    title="Pending Order">Pending Order</a>
                                                    @else

                                            <a href="{{ route('orders.confirm' , $order->id ) }}" class="btn btn-sm btn-primary"
                                                    title="Confirm Order">Confirm Order</a>
                                                    @endif

                                        </td>
                                        <td>
                                        <form method="post" action="{{ route ('orders.destroy' , $order->id )}}">
                                        {{ csrf_field()}}
                                            {{ method_field('DELETE') }}
                                        <button class="btn btn-sm btn-success ti-close"
                                                    title="Cancel Order"></button>
                                        </form>
                                      
                                                    

                                            <a href="{{ route('orders.show' , $order->id) }}" class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></a>

                                        </td>
                                    </tr>

                       @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        @endsection
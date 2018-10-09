@extends('admin.layouts.master')



@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{$user->name}} Orders Details</h4>
               
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
          @foreach ($user->orders as $order)
                            <tr>

                                <td>{{ $order->id}}</td>

                                <td>
                                    
                                        <table class="table">
                                        @foreach($order->products as $product )
                                            <tr>
                                                <td>{{ $product->name}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                          
                                </td>

                                <td>
                                 
                                        <table class="table">
                                        @foreach($order->OrderItems as $items )
                                            <tr>
                                                <td>{{ $items->qty }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                        
                                </td>

                         <td>
                                   
                                        <table class="table">
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>${{ $item->price }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                      
                                </td>


                                <td>
                                
                                        <span class="label label-success">Confirmed</span>
                                        <span class="label label-warning">Pending</span>
                         
                                </td>
                            </tr>
                     
@endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
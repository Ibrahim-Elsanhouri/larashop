@extends('admin.layouts.master')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Products</h4>
                                <p class="category">List of all stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Desc</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name}}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->details }}</td>
                                        <td><img src="{{ url('uploads').'/'. $product->image }}" alt="" class="img-thumbnail"
                                                 style="width: 100px"></td>
                                        <td>
                                            <a href="{{ route('products.edit' , $product->id)}}" class="btn btn-sm btn-info ti-pencil-alt" title="Edit">Edit</a>
                                            <form method="post"  action="{{ route('products.destroy' , $product->id)}}">
                                            {{ csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete">Delete</button>
                                            </form>
                                            <a href="{{ route('products.show' , $product->id)}}" class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details">View</a>
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
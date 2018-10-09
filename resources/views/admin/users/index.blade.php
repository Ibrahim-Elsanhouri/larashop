
     @extends('admin.layouts.master')
@section('content')  
<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users</h4>
                                <p class="category">List of all registered users</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                       
                                        <th>Status</th>
                                        <th>Change Status</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $users as $user )
                                    <tr>
                                        <td>{{ $user->id}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->email}}</td>
                               
                                        <td>
                                        @if($user->status)
                                        <span class="label label-success">Active</span>
                                        @else
                                        <span class="label label-danger">Disable</span>
@endif
                                        </td>
                                        <td>
                                        @if($user->status)
                                            <a href="{{ route('users.disable' , $user->id) }}" class="btn btn-sm btn-success ti-close" title="Block User">Disable</a>
@else
                                            <a href="{{ route('users.enable' , $user->id) }}" class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details">Enable</a>
                                                    @endif
                                        </td>

                                                   <td>
                                        <form method="post" action="{{ route ('users.destroy' , $user->id )}}">
                                        {{ csrf_field()}}
                                            {{ method_field('DELETE') }}
                                        <button class="btn btn-sm btn-success ti-close"
                                                    title="Cancel Order" onclick="return confirm('Are you sure you want to delete this User ? ')"></button>
                                        </form>
                                      
                                                    

                                            <a href="{{ route('users.show' , $user->id) }}" class="btn btn-sm btn-primary ti-view-list-alt"
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
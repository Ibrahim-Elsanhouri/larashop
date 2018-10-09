<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>JavasShop Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    <link href="{{ URL::asset('css/animate.min.css')}}" rel="stylesheet"/>

    <link href="{{ URL::asset('css/paper-dashboard.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('css/themify-icons.css')}}" rel="stylesheet"/>




    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    JavaShop Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/dashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/products/create">
                        <i class="ti-archive"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                <li>
                    <a href="/products">
                        <i class="ti-view-list-alt"></i>
                        <p>View Products</p>
                    </a>
                </li>
                <li>
                    <a href="/orders">
                        <i class="ti-calendar"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="/users">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                                <p>Account</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
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
 
              
                          @yield('content')             
                    
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    , made with <i class="fa fa-heart heart"></i> by <a href="">Ibrahim Elsanhouri</a>
                </div>
            </div>
        </footer>

    </div>
</div>

</body>


<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js')}}"></script>

<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>



</html>

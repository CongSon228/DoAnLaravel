<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{url('assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/main-style.css')}}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{url('assets/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">





<body>
    <!-- navbar top -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
        <!-- navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL('admin')}}">
                <img src="{{asset('assets/img/logo.png')}}" alt="" />
            </a>
        </div>
        <!-- end navbar-header -->
        <!-- navbar-top-links -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- main dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-3x"></i>
                </a>
                <!-- dropdown user-->
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>
                            @if(!Auth::check())
                    <li class="btn"><a href="login">Đăng nhập</a></li>
                    @else
                    <li class="btn">
                        <span class="glyphicon glyphicon-user">
                            Hello {{ Auth::user()->name }}
                        </span>
                    </li>
                    <li class="btn"><a href="logout"><button type="button" class="btn btn-dark">Đăng xuất</button></a>
                    </li>

                    @endif
                </ul> </a>
            </li>
            <li class="divider"></li>
            </li>
        </ul>
        <!-- end dropdown-user -->
        </li>
        <!-- end main dropdown -->
        </ul>
        <!-- end navbar-top-links -->

    </nav>
    <!-- end navbar top -->
    <!--  wrapper -->
    <div id="wrapper">

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="{{asset('assets/img/user.jpg')}}" alt="">
                            </div>
                            <div class="user-info">
                                <div>
                                    @if(!Auth::check())
                                    <strong>Admin</strong>
                                    @else
                                    <strong>Hello {{ Auth::user()->name }}</strong>
                                    @endif
                                </div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="{{URL('home')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('type.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Types</a>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Product</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>{{ Auth::user()->name }}</b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @section('content')
                    @yield('content')
                </div>

            </div>
        </div>





    </div>
    <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{url('assets/plugins/jquery-1.10.2.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('assets/plugins/pace/pace.js')}}"></script>
    <script src="{{url('assets/scripts/siminta.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
    </script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{url('assets/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{url('assets/plugins/morris/morris.js')}}"></script>
    <script src="{{url('assets/scripts/dashboard-demo.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BloodBank | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins') }}/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist') }}/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard.home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="{{ asset('adminlte/dist') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Blood Bank</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('adminlte/dist') }}/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('dashboard.home') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {{-- Governments --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt"></i>
                                <p>
                                    Governments
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.governments') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Governments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.creategovernment') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Government</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- cities --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Cities
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.cities') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All cities</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.createcity') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add city</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Categories --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Clients --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ion ion-person-add"></i>
                                <p>
                                    Clients
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.clients') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Clients</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Posts --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list"></i>
                                <p>
                                    Posts
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.posts.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Posts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Contacts --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    Contacts
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.contacts') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Contacts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Donation Requests --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    Donation Requests
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.donations') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Donation Requests</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Users --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ion ion-person-add"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.users.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Roles --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    Roles 
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.role.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Settings --}}
                        <li class="nav-item">
                            <a href="{{ route('dashboard.settings') }}" class="nav-link">
                                <i class="nav-icon fas fa-microchip"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid pt-1">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('title')
                                <small>@yield('small_title')</small>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Omar Muhammed</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins') }}/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist') }}/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist') }}/js/demo.js"></script>
    @stack('scripts')
</body>

</html>

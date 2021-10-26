<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Jquery Ui -->
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href={{ asset('css/navbar-fixed-side.css')}} rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-blue.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('additionalCss')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img style="border-radius: 50px;padding:5px;" src="{{ asset('images/logo.png') }}" height="50px" width="50px"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img style="border-radius: 50px;padding:5px;" src="{{ asset('images/logo.png') }}" height="50px" width="50px"> <b>{{ config('app.name') }}</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <a href="" class="navbar-brand">{{ config('app.name') }}</a>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('images/profile.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    {{--<p>{{ Auth::user()->name }}</p>--}}
                    <p class="text-muted">{{ config('app.name') }}</p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li><a href="{{ route('users') }}"><i class="fa fa-user-o" aria-hidden="true"></i><span>Users</span></a></li>
            </ul>
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('pageTitle')
            </h1>

            @yield('breadcrumbs')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>

        <strong>&copy; {{date('Y')}} <a href="#">Sender</a></strong> All rights reserved.
    </footer>
</div> <!-- ./wrapper -->

<!-- Scripts -->
<!-- JS Scripts -->

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery.min.js')  }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src={{ asset('js/bootstrap.min.js')}} type="text/javascript"></script>

<!-- Admin LTE -->
<script src="{{ asset('js/adminlte.js') }}"></script>

@yield('additionalJS')

</body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin CMS! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/admin/css/font-awesome.min.css')  }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/admin/css/nprogress.css')  }}" rel="stylesheet">



    
    <link rel="stylesheet" href="{{ asset('assets/admin/font-awesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/font-awesome/css/sb-admin-2.min.css') }}">



    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/css/custom.min.css')  }}" rel="stylesheet">
    @yield('links')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('my-home') }}" class="site_title"><i class="fa fa-paw"></i> <span>Admin CMS!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('assets/admin/images/basu.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />
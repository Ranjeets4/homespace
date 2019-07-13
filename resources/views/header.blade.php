<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="{{ url('public/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ url('/public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/animate.css')}}">
    <link rel="stylesheet" href="{{ url('/public/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ url('/public/css/fl-bigmug-line.css')}}">
    
  
    <link rel="stylesheet" href="{{ url('/public/css/aos.css')}}">

    <link rel="stylesheet" href="{{ url('/public/css/style.css')}}">
    
  </head>
  <body>
  
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="border-bottom bg-white top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">
              <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">+2 102 3923 3922</span></a>
              <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">info@domain.com</span></a>
            </p>  
          </div>
          <div class="col-6 col-md-6 text-right">
            <a href="#" class="mr-3"><span class="text-black icon-facebook"></span></a>
            <a href="#" class="mr-3"><span class="text-black icon-twitter"></span></a>
            <a href="#" class="mr-0"><span class="text-black icon-linkedin"></span></a>
          </div>
        </div>
      </div>
      
    </div>
    <div class="site-navbar">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class=""><a href="{{url('/')}}" class="h5 text-uppercase text-black"><strong>HomeSpace<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="{{ request()->segment(1)=='' ? 'active' : '' }}">
                    <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('/properties')}}">Properties</a>
                    <ul class="dropdown">
                      @foreach($ptypes as $ptype)
                      <li><a href="{{url('/propertytypes'.'/'.$ptype->slug)}}">{{$ptype->Title}}</a></li>
                      @endforeach
                      
                    </ul>
                  </li>
                  <li class="{{ request()->segment(1)=='about' ? 'active' : '' }}"><a href="{{url('/about')}}">About</a></li>
                  <li><a href="{{url('/contact')}}">Contact</a></li>
                  <li class="has-children">
                        <a href="{{url('/login')}}">Account &nbsp&nbsp</a>
                        <ul class="dropdown">
                        @if(session("homespace_id"))
                          <li><a href="{{url('/profile')}}">{{session(homespace_id)}}</a></li>
                          <li><a href="{{url('/logout')}}">logout</a></li>
                          
                        @else
                          <li><a href="{{url('/login')}}">Login</a></li>
                          <li><a href="{{url('/register')}}">Register</a></li>
                        @endif
                        </ul>
                      </li>
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>
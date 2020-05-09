<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    

   <!--  <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('public/img/favicon.png') }}" rel="icon">
    <link href="{{ url('public/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,800&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ url('public/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('public/css/style.css') }}" rel="stylesheet">
   
    <link href="{{ url('public/css/app.css') }}" rel="stylesheet">
    <style>
      .error {
        color: red;
      }
    </style>
    
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex">

        <div class="logo">
        <!--   <h1 class="text-light"><a href="index.html"><span>Squadfree</span></a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
           <a href="{{ url('/') }}"><img src="{{ url('public/img/logo.png') }}" alt="" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="#header">Find tutors</a></li>                   
            <li><a href="#about">Enterprise</a></li>
            <!-- <li><a href="#services">Become a tutor</a></li>  -->
            <li><a href="become_a_tutors">Become a tutor</a></li>
                    
          </ul>

          <ul class="pull-right">
            <li class="active"><a href="#"><span><img src="{{ url('public/img/logIcon1.png') }}"></span> English</a></li>
            @guest
            @if (Route::has('register'))               
              <li><a href="signin"><span><img src="{{ url('public/img/logIcon2.png') }}"></span> Login</a></li>
              <li><a href="registration"><span><img src="{{ url('public/img/logIcon3.png') }}"></span> Sign Up</a></li>
            @endif
            @else
              <li><a href="{{ url('logout') }}" ><span><img src="{{ url('public/img/logIcon3.png') }}"></span>{{ __('Logout') }}</a></li>
            @endguest         
          </ul>
           
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End Header -->
    <!-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
					<ul class="navbar-nav ml-auto">

					
					</ul>
					
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item">
                            <a  class="nav-link" href="login">login</a>
                        </li>
                        <li class="nav-item" >
                             <a class="nav-link" href="registration">Sign up</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="become_a_tutors">Become a Tutors</a>
                        </li> 
                       
                             
                    </ul>
            @guest
            @if (Route::has('register'))
            @endif
            @else
						  <a class="btn btn-primary" href="{{ url('logout') }}" >{{ __('Logout') }}</a>
					  @endguest
            </div>
				
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div> -->
     <!-- ======= Hero Section ======= -->
      <section id="hero">
        <div class="hero-container" data-aos="fade-up">
          <div class="homepage-fluent">
            <h1><span lang="en-us">BECOME FLUENT IN ANY LANGUAGE</span></h1>
            <p><span lang="en-us">Explore the world on Online class</span></p>
            <div class="homepage-menu">
              <div class="homepage-menu-choice">
                <input class="homepage-menu-select" type="text" placeholder="Choose a Language" value="">
                <span class="homepage-search-icon">
                  <img width="24" height="24" src="{{ url('public/img/icon-search.svg') }}" alt="search">
                </span>
              </div>
            </div>
          </div>
          
        </div>
        <a href="#teacherSection" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
      </section><!-- End Hero -->
      



<!doctype html><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Mirrored from templates.envytheme.com/raque/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Feb 2021 06:29:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap..min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/viewer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <title>DANA SCHOOL || @yield('page-name')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
</head>
<body>

{{-- 
                                                    <div class="preloader">
                                                        <div class="loader">
                                                            <div class="shadow"></div>
                                                            <div class="box"></div>
                                                        </div>
                                                    </div> --}}



        <header class="header-area">
            <div class="top-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <ul class="top-header-contact-info">
                                <li>
                                    <i class='bx bx-phone-call'></i>
                                    <span>Contact support</span>
                                    <a href="tel:502464674">+502 464 674</a>
                                </li>
                                <li>
                                    <i class='bx bx-map'></i>
                                    <span>Our location</span>
                                    <a href="#">New York, USA</a>
                                </li>
                                <li>
                                    <i class='bx bx-envelope'></i>
                                    <span>Contact email</span>
                                    <a href="#">
                                        <span class="__cf_email__" data-cfemail="573f323b3b381725362622327934383a">[email&#160;protected]</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="top-header-btn">
                                        <a href="{{ route('login') }}" target="_blank" class="default-btn">
                                            <i class='bx bx-log-in icon-arrow before'></i>
                                            <span class="label">Log In</span>
                                            <i class="bx bx-log-in icon-arrow after"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="top-header-btn">
                                        <a href="{{ route('register') }}" target="_blank" class="default-btn">
                                            <i class='bx bx-log-in icon-arrow before'></i>
                                            <span class="label">Sign Up</span>
                                            <i class="bx bx-log-in icon-arrow after"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-area">
                <div class="raque-responsive-nav">
                    <div class="container">
                        <div class="raque-responsive-menu">
                            <div class="logo">
                                <a href="index-2.html">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="raque-nav">
                        <div class="container">
                            <nav class="navbar navbar-expand-md navbar-light">
                                <a class="navbar-brand" href="index-2.html">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                                    </a>
                                    <div class="collapse navbar-collapse mean-menu">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a href="{{ route('website.index') }}" class="nav-link active">Home 
                                                    <i class='bx bx-chevron-down'></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('website.about') }}" class="nav-link">About Us 
                                                    <i class='bx bx-chevron-down'></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a href="{{ route('website.about') }}" class="nav-link">About Us
                                                            {{-- <i class='bx bx-chevron-right'></i> --}}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('website.instructors') }}" class="nav-link">Instructor 
                                                            {{-- <i class='bx bx-chevron-right'></i> --}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('website.course') }}" class="nav-link">Services
                                                    <i class='bx bx-chevron-down'></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('website.course') }}" class="nav-link">Courses
                                                    <i class='bx bx-chevron-down'></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('website.course') }}" class="nav-link">Blog
                                                    <i class='bx bx-chevron-down'></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('website.contact') }}" class="nav-link">Contact
                                                    <i class='bx bx-chevron-down'></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-area header-sticky">
                        <div class="raque-nav">
                            <div class="container">
                                <nav class="navbar navbar-expand-md navbar-light">
                                    <a class="navbar-brand" href="{{ route('website.index') }}">
                                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                                        </a>
                                        <div class="collapse navbar-collapse">
                                            <ul class="navbar-nav">
                                                <li class="nav-item">
                                                    <a href="{{ route('website.index') }}" class="nav-link active">Home 
                                                        <i class='bx bx-chevron-down'></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('website.about') }}" class="nav-link">About Us 
                                                        <i class='bx bx-chevron-down'></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item">
                                                            <a href="{{ route('website.about') }}" class="nav-link">About 
                                                                <i class='bx bx-chevron-right'></i>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="{{ route('website.instructors') }}" class="nav-link">Instructor 
                                                                <i class='bx bx-chevron-right'></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('website.course') }}" class="nav-link">Services 
                                                        <i class='bx bx-chevron-down'></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">Blog 
                                                        <i class='bx bx-chevron-down'></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('website.course') }}" class="nav-link">Courses</a>
                                                    {{-- <i class='bx bx-chevron-down'></i> --}}
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('website.contact') }}" class="nav-link">Contact</a>
                                                    {{-- <i class='bx bx-chevron-down'></i> --}}
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </header>
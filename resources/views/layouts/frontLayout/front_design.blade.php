<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="@if(!empty($meta_title)){{ $meta_title }} @else {{config('app.name')}} @endif">
    <meta name="keywords" content="@if(!empty($meta_keywords)){{ $meta_keywords }} @else {{config('app.name')}} @endif">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/fevicon_deepdive.png')}}">
    <title>@if(!empty($meta_title)){{ $meta_title }} @else {{config('app.name')}} @endif</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(!empty($meta_description)) <meta name="description" content="{{ $meta_title }}"> 
    @else <meta name="description" content="{{config('app.name')}}"> @endif

    <meta property="og:title" content="{{config('app.name')}}" />
    <meta property="og:type" content="site" />
    <meta property="og:description" content="{{config('app.name')}}" />
    <meta property="og:url" content="{{url('/')}}" />
    <meta property="og:image"  content="{{asset('assets/images/DeepDiveGoa-Logo.svg')}}"/>
    
    <meta name="twitter:title" content="{{config('app.name')}}">
    <meta name="twitter:description" content="{{config('app.name')}}">
    <meta name="twitter:image"  content="{{asset('assets/images/fevicon_deepdive.png')}}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
   
    @yield('styles')
</head>
<body id="body" class="menu-overlay-enabled">
    <div id="smooth-wrapper"></div>
    <div id="smooth-content"></div>
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="page-loading">
                    <div class="page-loading-inner">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <!-- Page Header-->
    @include('layouts/frontLayout/front_header')

    @yield('content')

    <!-- Page Footer-->
    @include('layouts/frontLayout/front_footer')

    {{-- <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div> --}}

    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/appear.js')}}"></script>
    <script src="{{asset('assets/js/swiper.min.js')}}"></script>

    <script src="{{asset('assets/js/gsap.min.js')}}"></script>
    <script src="{{asset('assets/js/ScrollTrigger.min.js')}}"></script>
    <script src="{{asset('assets/js/SplitText.min.js')}}"></script>
    <script src="{{asset('assets/js/splitType.js')}}"></script>
    <script src="{{asset('assets/js/ScrollSmoother.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/mixitup.js')}}"></script>
    <script src="{{asset('assets/js/parallax-scroll.js')}}"></script>
    <script src="{{asset('assets/js/element-in-view.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/script-gsap.js')}}"></script>
  
    <!-- form submit -->
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.form.min.js')}}"></script>
    <script src="{{asset('assets/js/contact-form-script.js')}}"></script>

    @yield('scripts')

</body>
</html>
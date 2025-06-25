<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Index | Minimalin eCommerce Bootstrap 5 Template.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/futura-std-4">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">



</head>


<body>


    <main class="main_wrapper body__overlay overflow__hidden">

        {{-- navbar --}}
        @include('layouts.components-frontend.navbar')
        {{-- end navbar --}}



        {{-- content --}}
        @yield('content')
        {{-- end content --}}



        <!-- footer__section__start -->
        @include('layouts.components-frontend.footer')
        <!-- footer__section__end -->

    </main>


    <!-- JS here -->
    <script src="{{asset('assets/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/one-page-nav-min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
    @include('sweetalert::alert')
    @yield('js')
    @stack('scripts')
</body>

</html>
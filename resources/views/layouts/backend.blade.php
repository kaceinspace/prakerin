<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/backend/images/logos/favicon.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/styles.css') }}" />

    <title>Modernize Bootstrap Admin</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/backend/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    {{-- menambah wadah style dan akan dipanggil ketika dibutuhkan --}}
    @yield('styles')
</head>

<body>
    <div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/backend/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @include('layouts.components-backend.sidebar')
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            @include('layouts.components-backend.navbar')
            <!--  Header End -->

            <div class="body-wrapper">
                @yield('content')
            </div>
            <script>
                function handleColorTheme(e) {
                    document.documentElement.setAttribute("data-color-theme", e);
                }
            </script>

        </div>


    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('assets/backend/js/vendor.min.js') }}"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('assets/backend/js/theme/theme.js') }}"></script>
    <script src="{{ asset('assets/backend/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/theme/sidebarmenu.js') }}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/backend/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dashboards/dashboard.js') }}"></script>
    {{-- menambah wadah js baru dan akan dipanggil ketika dibutuhkan --}}
    @include('sweetalert::alert')
    @yield('js')
    @stack('scripts')
</body>

</html>
<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
<html dir="rtl" lang="ar">
@else
<html lang="en">
@endif

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if (env('IS_DEMO'))
    <x-demo-metas></x-demo-metas>
    @endif

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
    @auth
    @extends('layouts.app')

    @section('auth')


    @if(\Request::is('static-sign-up'))
    @include('layouts.navbars.guest.nav')
    @yield('content')
    @include('layouts.footers.guest.footer')

    @elseif (\Request::is('static-sign-in'))
    @include('layouts.navbars.guest.nav')
    @yield('content')
    @include('layouts.footers.guest.footer')

    @else
    @if (\Request::is('rtl'))
    @include('layouts.navbars.auth.sidebar-rtl')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
        @include('layouts.navbars.auth.nav-rtl')
        <div class="container-fluid py-4">
            @yield('content')
            @include('layouts.footers.auth.footer')
        </div>
    </main>

    @elseif (\Request::is('profile'))
    @include('layouts.navbars.auth.sidebar')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        @include('layouts.navbars.auth.nav')
        @yield('content')
    </div>

    @elseif (\Request::is('virtual-reality'))
    @include('layouts.navbars.auth.nav')
    <div class="border-radius-xl mt-3 mx-3 position-relative" style="background-image: url('../assets/img/vr-bg.jpg') ; background-size: cover;">
        @include('layouts.navbars.auth.sidebar')
        <main class="main-content mt-1 border-radius-lg">
            @yield('content')
        </main>
    </div>
    @include('layouts.footers.auth.footer')

    @else
    @include('layouts.navbars.auth.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ (Request::is('rtl') ? 'overflow-hidden' : '') }}">
        @include('layouts.navbars.auth.nav')
        <div class="container-fluid py-4">
            @yield('content')
            @include('layouts.footers.auth.footer')
        </div>
    </main>
    @endif

    @include('components.fixed-plugin')
    @endif



    @endsection
    @endauth
    @guest
    @extends('layouts.app')

    @section('guest')
    @if(\Request::is('login/forgot-password'))
    @include('layouts.navbars.guest.nav')
    @yield('content')
    @else
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.nav')
            </div>
        </div>
    </div>
    @yield('content')
    @include('layouts.footers.guest.footer')
    @endif
    @endsection
    @endguest

    @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
        <p class="m-0">{{ session('success')}}</p>
    </div>
    @endif
    <!--   Core JS Files   -->
    <script src="../../../assets/js/core/popper.min.js"></script>
    <script src="../../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../../assets/js/plugins/fullcalendar.min.js"></script>
    <script src="../../../assets/js/plugins/chartjs.min.js"></script>
    @stack('rtl')
    @stack('dashboard')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
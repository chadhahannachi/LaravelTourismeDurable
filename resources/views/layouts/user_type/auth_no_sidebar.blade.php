@extends('layouts.app')

@section('auth')

    @include('layouts.navbars.auth.nav') <!-- Inclut seulement le navbar -->
    
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            @yield('content') <!-- Contenu de la page -->
            @include('layouts.footers.auth.footer') <!-- Inclut le footer -->
        </div>
    </main>

@endsection

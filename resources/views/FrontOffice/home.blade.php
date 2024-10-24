@extends('layouts.FrontOffice.auth_no_sidebar')

@section('content')

<div class="row">
  <div class="col-12 text-center my-2">
    <h1 class="display-4 text-success font-weight-bold">Explorez le Monde avec un Impact Positif</h1>
    <p class="lead">Découvrez des destinations durables et des activités écologiques pour un voyage respectueux de l'environnement.</p>
    <a href="{{ route('destination.display') }}" class="btn btn-lg btn-success mt-4">Nos Destinations Écologiques</a>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold">Voyagez Responsable</p>
              <h5 class="font-weight-bolder">Des Destinations Durables</h5>
              <p class="mb-5">Parcourez nos destinations qui allient aventure et respect de l'environnement. Éco-resorts, itinéraires à faible impact carbone, et plus encore.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card h-100 p-3">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/destination-eco.jpg');">
        <span class="mask bg-gradient-dark"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white font-weight-bolder mb-4 pt-2">Activités Écologiques</h5>
          <p class="text-white">Profitez d'activités locales respectueuses de l'environnement : randonnées, vélos, écotourisme, et plus encore.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-6 mb-lg-0 mb-4">
    <div class="card bg-light p-3">
      <div class="d-flex flex-column h-100 text-center">
        <h5 class="font-weight-bolder">Un Impact Positif</h5>
        <p class="mb-4">Chaque voyage contribue à la protection des écosystèmes locaux et au développement des communautés.</p>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card bg-light p-3">
      <div class="d-flex flex-column h-100 text-center">
        <h5 class="font-weight-bolder">Voyagez en Toute Confiance</h5>
        <p class="mb-4">Nous vous aidons à voyager en harmonie avec la nature, en vous assurant que chaque destination respecte les principes de durabilité.</p>
      </div>
    </div>
  </div>
</div>

@endsection

@extends('layouts.user_type.auth_no_sidebar')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
    <div class="text-center wow fadeInUp w-full" style="max-width: 750px; margin-bottom: 50px;">
        <h1 class="mb-4 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl md:text-[45px]">
            Les itineraires 
        </h1>
        <p class="text-base leading-relaxed text-body-color md:text-lg">
        Découvrez des itinéraires écologiques avec leurs arrêts et transports, pour un voyage respectueux de l'environnement        </p>
    </div>
        <div class="col-lg-7 col-md-6">
            @foreach($itineraires as $itineraire)
            <div class="card mb-3">
                <div class="card-header pb-0">
                    <h6>{{ $itineraire->nomItineraire }}</h6>
                    <p class="text-sm">
                        <span class="font-weight-bold">{{ $itineraire->distance }} km</span> 
                    </p>
                </div>
                <div class="card-body">
                    <div class="timeline timeline-one-side">
                        @foreach($itineraire->etapes as $index => $etape)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <span class="text-success">{{ $index + 1 }}</span> <!-- Numéro de l'étape -->
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $etape->nomEtape }}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">                        
                                    <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                                        {{ $etape->localisation }}
                                </p>
                                <p class="text-sm">
                            <span class="font-weight-bold">Moyen de Transport : {{ $itineraire->moyenTransport }}</span> 
                        </p>
                                <p class="text-dark text-xs mt-1 mb-0">{{ $etape->description }}</p>
                                

                                @if($etape->impact)
                                <p class="text-success font-weight-bold text-xs mt-1 mb-0">
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                                    Cette étape a un impact écologique
                                </p>
                                @else
                                <p class="text-danger font-weight-bold text-xs mt-1 mb-0">
                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                    Cette étape n'a pas un impact écologique
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

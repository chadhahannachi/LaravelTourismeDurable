@extends('layouts.FrontOffice.auth_no_sidebar')
@section('content')
<div class="d-flex flex-column align-items-center justify-content-start" style="padding-top: 10px;">
    <div
        class="text-center wow fadeInUp w-full {{ isset($center) && $center ? 'mx-auto text-center' : '' }}"
        data-wow-delay=".1s"
        style="max-width: 750px; margin-bottom: 50px;">
        <h1 class="mb-4 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl md:text-[45px]">
            Destination Details
        </h1>
        <p class="text-base leading-relaxed text-body-color md:text-lg">
            Explore our selection of destinations committed to sustainable tourism. Learn about their histories, ecological initiatives, and how they help preserve our environment.
        </p>
    </div>
</div>
<div class="card" style="margin:20px;">
    <div class="card-body">
        <div class="card-body" style="display: flex; align-items: start; margin-left: 5rem;">
            <img src="{{ asset('images/' . $destination->image) }}" class="avatar me-3" alt="user1" style="width: 100%; height: 100%; max-width: 350px;">
            <div style="margin-left: 5rem; margin-top: 20px;">
                <h5 class="card-title">{{ $destination->nom }}</h5>
                <div style="display: flex;">
                        <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $destination->niveauDurabilite ? 'filled' : '' }}"></i>
                            @endfor
                    </div>
                    <p style="margin-left: 10px;">{{$destination->niveauDurabilite}}/10</p>
                </div>
                <style>
                    .star-rating i {
                        font-size: 14px;
                        color: #e0e0e0;

                    }

                    .star-rating .filled {
                        color: rgb(203, 12, 159);
                    }
                </style>
                <p class="card-text"><span style="font-weight: 600;">Description :</span> {{ $destination->description }}</p>
                <p class="card-text"><span style="font-weight: 600;">localisation :</span> {{ $destination->localisation }}</p>
                <p class="card-text"><span style="font-weight: 600;">Sustainability Level</span> : {{ $destination->niveauDurabilite }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
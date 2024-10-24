@extends('layouts.FrontOffice.auth_no_sidebar')

@section('content')
<div>
    <div class="d-flex flex-column align-items-center justify-content-start" style="padding-top: 10px;">
        <div
            class="text-center wow fadeInUp w-full {{ isset($center) && $center ? 'mx-auto text-center' : '' }}"
            data-wow-delay=".1s"
            style="max-width: 750px; margin-bottom: 50px;">
            <h1 class="mb-4 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl md:text-[45px]">
                Discover All Destination
            </h1>
            <p class="text-base leading-relaxed text-body-color md:text-lg">
                Explore our selection of destinations committed to sustainable tourism. Learn about their histories, ecological initiatives, and how they help preserve our environment.
            </p>
        </div>
    </div>
    <div class="row">
        @foreach($destinations as $item)
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4 d-flex align-items-stretch">
            <div class="card mx-2" style="width: 100%; max-width: 900px;">
                <div class="card-head" style="position: relative; height: 250px; overflow: hidden;"> <!-- Make parent position relative -->
                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $item->nom }}">
                    <a href="{{ url('/destinationDetails/' . $item->id) }}" class="btn btn-primary" style="position: absolute; top: 10px; right: 10px; z-index: 10;">{{ $item->nom }}</a> <!-- Button in the top right corner -->
                </div>
                <div class="card-body px-3 py-2">
                    <div style="display: flex; justify-content: space-between;">
                        <h5 class="card-title">Sustainability : </h5>
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $item->niveauDurabilite ? 'filled' : '' }}"></i>
                                @endfor
                        </div>
                    </div>
                    <style>
                        .star-rating i {
                            font-size: 15px;
                            color: #e0e0e0;
                        }

                        .star-rating .filled {
                            color: rgb(203, 12, 159);
                        }
                    </style>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
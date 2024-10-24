@extends('layouts.FrontOffice.auth_no_sidebar')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-start" style="padding-top: 10px;">
    <div class="text-center wow fadeInUp w-full" style="max-width: 750px; margin-bottom: 50px;">
        <h1 class="mb-4 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl md:text-[45px]">
            Activities
        </h1>
        <p class="text-base leading-relaxed text-body-color md:text-lg">
            Discover a range of activities that promote sustainable tourism. Learn about their impacts, histories, and ecological initiatives.
        </p>
    </div>

    <div class="row">
        @foreach($activites as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-light rounded">
                    <div class="card-body d-flex align-items-start" style="padding: 20px;">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nom }}" class="avatar me-3 rounded" style="width: 100%; max-width: 150px; height: auto;">
                        @else
                            <p class="text-muted">No image available</p>
                        @endif
                        <div class="ms-3">
                            <h5 class="card-title text-dark fw-bold">{{ $item->nom }}</h5>
                            <p class="card-text text-muted">
                                <strong>Description:</strong> {{ \Illuminate\Support\Str::limit($item->description, 60, '...') }}
                            </p>
                            <p class="card-text text-muted"><strong>Availability:</strong> {{ $item->disponibilite }}</p>

                            <div class="d-flex justify-content-between mt-3">
                                <!-- View button -->
                                <a href="{{ url('/activite/' . $item->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="View activity">
                                    Details
                                    <i class="fas fa-eye ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Include modal -->
                    @include('activites.modal', ['item' => $item])
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

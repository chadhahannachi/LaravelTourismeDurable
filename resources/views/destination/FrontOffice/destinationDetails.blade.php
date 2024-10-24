@extends('layouts.FrontOffice.auth_no_sidebar')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-start" style="padding-top: 10px;">
    <div class="text-center wow fadeInUp w-full" style="max-width: 750px; margin-bottom: 50px;">
        <h1 class="mb-4 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl md:text-[45px]">
            Destination Details
        </h1>
        <p class="text-base leading-relaxed text-body-color md:text-lg">
            Explore our selection of destinations committed to sustainable tourism. Learn about their histories, ecological initiatives, and how they help preserve our environment.
        </p>
    </div>

    <div class="card" style="width: fit-content;">
        <div class="card-body" style="margin-right: 10rem;">
            <div class="card-body" style="display: flex; align-items: start; margin-left: 3rem;">
                <img src="{{ asset('images/' . $destination->image) }}" class="avatar me-3" alt="destination" style="width: 100%; height: 100%; max-width: 200px;">
                <div style="margin-left: 5rem; margin-top: 20px;">
                    <h5 class="card-title">{{ $destination->nom }}</h5>
                    <div style="display: flex; align-items: start;">
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $destination->niveauDurabilite ? 'filled' : '' }}" style="color: {{ $i <= $destination->niveauDurabilite ? 'rgb(203, 12, 159)' : 'lightgray' }};"></i>
                                @endfor
                        </div>
                        <p style="margin-left: 10px; margin-right: 100px;">{{ $destination->niveauDurabilite }}/10</p>
                        <p class="card-text"><span style="font-weight: 600;"><i class="fas fa-map-marker-alt"></i></span> {{ $destination->localisation }}</p>
                    </div>
                    <div style="margin-right: 20px;">
                        <p class="card-text"><span style="font-weight: 600;">Description :</span> {{ $destination->description }}</p>
                    </div>
                    <div style="border-left: 1px solid #ccc; height: auto; margin-right: 20px;"></div>

                    <div style="display: flex; justify-content: space-between;">
                        <div style="padding-left: 0px;">
                            <h5>Attractions</h5>
                            @if($destination->attractions->isEmpty())
                            <p>No attractions available for this destination.</p>
                            @else
                            <ul>
                                @foreach($destination->attractions as $attraction)
                                <li>
                                    <strong>{{ $attraction->nomAttraction }}</strong> - {{ $attraction->typeAttraction }}: {{ $attraction->descriptionAttraction }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div>   <a href="{{ route('activite.index_front') }}" class="btn bg-gradient-primary btn-sm mb-0" style="background-color: rgb(203, 12, 159); border-color: rgb(203, 12, 159);">
                            Show Activities
                        </a>
                          <a href="{{ url('/itinerairelistfront') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button"> les itineraires</a>
                    </div>
                </div>
            </div>

            <!-- Tabs for Reviews and Add Review -->
            <div class="mt-4">
                <ul class="nav nav-tabs" id="reviewTabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#user-reviews" data-toggle="tab">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#add-review" data-toggle="tab">Add Review</a>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    <!-- User Reviews Tab -->
                    <div class="tab-pane fade show active" id="user-reviews">
                        @if($destination->rates->isEmpty())
                        <p>No reviews available for this destination.</p>
                        @else
                        <div style="display: flex; flex-direction: row; flex-wrap: wrap; gap: 20px; justify-content: flex-start;">
                            @foreach($destination->rates as $rate)
                            <div class="list-group-item" style="background: #F5F5F5; padding: 15px; border-radius: 5px; max-width: 350px; flex: 1 0 300px; margin-bottom: 10px;"> <!-- Use flex for each review -->
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <strong style="color: black;">{{ $rate->user->name ?? 'Anonymous' }}</strong>
                                    <div class="star-rating" style="margin-left: 10px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $rate->stars ? 'filled' : '' }}" style="color: {{ $i <= $rate->stars ? 'rgb(203, 12, 159)' : 'lightgray' }};"></i>
                                            @endfor
                                    </div>
                                </div>
                                <p style="color: black; margin-top: 5px;">{{ $rate->review }}</p>
                            </div>
                            @endforeach
                        </div>

                        @endif
                    </div>

                    <!-- Add Review Tab -->
                    <div class="tab-pane fade" id="add-review">
                        <h5>Leave a Review</h5>
                        <form action="{{ route('rate.store', $destination->id) }}" method="POST">
                            @csrf
                            <div class="star-rating" id="star-rating" style="font-size: 24px;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="far fa-star" data-value="{{ $i }}" style="color: lightgray;"></i>
                                    @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating-input" value="0">
                            <div class="form-group mt-3">
                                <label for="review-text">Your Review</label>
                                <textarea name="review" id="review-text" class="form-control" rows="4" placeholder="Write your review here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('#star-rating i');
        const ratingInput = document.getElementById('rating-input');

        // Initialize stars based on existing rating
        highlightStars(ratingInput.value);

        stars.forEach((star) => {
            star.addEventListener('mouseover', function() {
                const value = this.getAttribute('data-value');
                highlightStars(value, 'rgb(203, 12, 159)'); // Change hover color here
            });

            star.addEventListener('mouseout', function() {
                highlightStars(ratingInput.value);
            });

            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;
                highlightStars(value);
            });
        });

        function highlightStars(value, hoverColor = 'rgb(203, 12, 159)') {
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.remove('far');
                    star.classList.add('fas', 'filled');
                    star.style.color = hoverColor; // Set the color for filled stars
                } else {
                    star.classList.remove('fas', 'filled');
                    star.classList.add('far');
                    star.style.color = 'rgb(203, 12, 159)'; // Set the default color for unfilled stars
                }
            });
        }

        // Tab click event listener
        const tabs = document.querySelectorAll('#reviewTabs .nav-link');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const target = this.getAttribute('href');

                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));

                // Add active class to the clicked tab
                this.classList.add('active');

                // Hide all tab content
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });

                // Show the target tab content
                document.querySelector(target).classList.add('show', 'active');
            });
        });
    });
</script>

@endsection
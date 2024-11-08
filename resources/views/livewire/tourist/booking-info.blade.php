<div>
    <div style="height: 25vh;">
        <!-- spacer -->
    </div>
    <div class="container" style="margin-bottom: 5vh;">

        <div class="col-lg-12">
            <div class="card shadow">
                @if ($experience)
                <img src="{{ $experience->photo ? Storage::url($experience->photo) : asset('assets/ecotour/img/tour_default.jpg') }}"
                    class="card-img-top" alt="{{ $experience->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $experience->title }}</h3>
                    <p class="card-text">{{ $experience->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Category:</strong> {{ $experience->category }}</li>
                        <li class="list-group-item"><strong>Location:</strong> {{ $experience->location }}</li>
                        <li class="list-group-item"><strong>Price:</strong>
                            ${{ number_format($experience->price, 2) }}</li>
                    </ul>
                </div>
                @else
                <div class="card-body">
                    <p>No experience details available.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
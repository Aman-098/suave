@if(($fleet ?? collect())->count())
    <div class="seo-section">
        <h2>{{ $vehicleTitle ?? 'Vehicles for this journey' }}</h2>
        <div class="seo-cards">
            @foreach($fleet as $vehicle)
                <a class="seo-card" href="{{ url('/fleet/' . $vehicle->slug) }}">
                    @if($vehicle->image)
                        <img class="seo-card-img" src="{{ asset('storage/' . $vehicle->image) }}"
                             alt="{{ $vehicle->name }} chauffeur hire" loading="lazy" width="480" height="300">
                    @endif
                    <div class="seo-card-name">{{ $vehicle->name }}</div>
                </a>
            @endforeach
        </div>
    </div>
@endif

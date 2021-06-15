
<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Les annonces
    </h2>
</x-slot name="header">

<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            @foreach ($ads as $ad)
                <div class="card mb-3" style="width: 50%;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('storage') }}/{{ $ad->photo }}" style="width: 100px; border:thick double black;" alt="Card image cap">
                    <br>
                        <h5 class="card-title">Titre : {{ $ad->title }}</h5>
                        <p class="card-text text-info">Description : {{ $ad->description}}</p>
                        <p class="card-text">Localisation : {{ $ad->localisation}}</p>
                        <p class="card-text">Prix : {{ $ad->price}} $</p>
                        <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small>
                        <br>
                    </div>
                </div>
            @endforeach
            {{ $ads->links() }}
        </div>
    </div>
</div>
</x-app-layout>

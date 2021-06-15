<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Mes annonces
    </h2>
</x-slot name="header">

<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            @foreach ($myAds as $myAd)
                <div class="card mb-3" style="width: 50%;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('storage') }}/{{ $myAd->photo }}" style="width: 100px; border:thick double black;" alt="Card image cap" >
                    <br>
                        <h5 class="card-title">Titre : {{ $myAd->title }}</h5>
                        <p class="card-text text-info">Description : {{ $myAd->description}}</p>
                        <p class="card-text">Localisation : {{ $myAd->localisation}}</p>
                        <p class="card-text">Prix : {{ $myAd->price}} $</p>
                        <small>{{ Carbon\Carbon::parse($myAd->created_at)->diffForHumans() }}</small>
                        <br><br>
                        <a href={{ route('Annonce.deleteMyAd', ['id' => $myAd->id] ) }} class="btn btn-danger">Supprimer</a>
                        <a href={{ route('Annonce.showEditMyAd', ['id' => $myAd->id] ) }} class="btn btn-warning">Modifier</a>
                    </div>
                </div>
            @endforeach
            {{ $myAds->links() }}
        </div>
    </div>
</div>
</x-app-layout>

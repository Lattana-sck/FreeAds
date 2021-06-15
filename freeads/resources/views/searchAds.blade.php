<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Rechercher une annonce
    </h2>
</x-slot name="header">
<div class="container">
    <form method="POST" action="{{ route('Annonce.searchAdsByTitle') }}" class="row justify-content-center" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Titre" required>
            <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
    <form method="POST" action="{{ route('Annonce.searchAdsByLocalisation') }}" class="row justify-content-center" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" class="form-control" name="localisation" id="localisation" aria-describedby="localisation" placeholder="localisation" required>
            <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    <form method="POST" action="{{ route('Annonce.searchAdsByPrice') }}" class="row justify-content-center" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="pricemin">Entrer un prix minimum</label>
            <br><br>
            <input type="number" class="form-control" id="pricemin" name="pricemin" value="1">
            <br>
            <label for="pricemax">Entrer un prix maximum</label>
            <br><br>
            <input type="number" class="form-control" id="pricemax" name="pricemax" value="1000">
            <br>
            <button type="submit" class="btn btn-primary">Rechercher</button>
            
        </div>
    </form>
</div>
 




</x-app-layout>

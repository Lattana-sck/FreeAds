
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Déposer une annonce
        </h2>

    </x-slot name="header">

<div class="container">
<div class="card-body">

    <form method="POST" action="{{ url('/annonce/create') }}" class="row justify-content-center" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="title">Titre de l'annonce</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Titre" required>
        </div>

        <div class="form-group">
            <label for="description">Description de l'annonce</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description de l'annonce" required></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" required>
        </div>

        <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Prix" required>
        </div>

        <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" class="form-control" id="localisation" name="localisation" placeholder="Localisation" required>
        </div>
        <div class="form-group">
        <br>
        </div>
        <div class="form-group" >
        <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
</div>
</x-app-layout>

<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Modifier mon annonce
    </h2>

</x-slot name="header">

    <div class="container">
        <div class="card-body">
                <form method="POST" action="{{ route('Annonce.EditMyAd', ['id' => $editMyAds->id]) }}" class="row justify-content-center" enctype="multipart/form-data">
                @csrf
                
                    <div class="form-group">
                        <label for="title">Titre de l'annonce</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" value="{{ $editMyAds->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description de l'annonce</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description de l'annonce" required>{{ $editMyAds['description'] }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Votre photo actuelle :</label>
                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $editMyAds->photo }}" style="width: 100px; border:thick double black;" alt="Card image cap" >
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $editMyAds->price }}" required>
                    </div>

                    <div class="form-group">
                        <label for="localisation">Localisation</label>
                        <input type="text" class="form-control" id="localisation" name="localisation" value="{{ $editMyAds->localisation }}" required>
                    </div>
                    <div class="form-group">
                        <br>
                    </div>
                    <div class="form-group" >
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                
                </form>
        </div>
    </div>
</x-app-layout>
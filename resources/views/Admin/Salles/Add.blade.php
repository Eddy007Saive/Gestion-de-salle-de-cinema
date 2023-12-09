@extends('home')
@section('article')
<div class=" w-100 d-flex justify-content-center align-items-center" style="height:100vh;">
    @isset($salle)
    <form action=" {{route('Salle.update')}} " method="post" class="w-50 shadow-lg p-4 border-4">
        @else
        <form action=" {{route('Salle.store')}} " method="post" class="w-50 shadow-lg p-4 border-4">
            @endisset
            @csrf
            <label for="nom" class="form-label">Nom du Salle</label>
            <input type="text" name="nom" id="" class="form-control" value="{{$salle['nom'] ?? '' }}">
            @error('nom')
            <p class="text-danger text-center">{{$message}}</p>
            @enderror
            <input type="hidden" name="id" value="{{$salle['id'] ?? '' }}">
            <label for="nbrplace" class="form-label">Nombre de place:</label>
            <input type="number" name="nbrplace" id="" class="form-control" value="{{$salle['nbr_place'] ?? '' }}">
            @error('nbrplace')
            <p class="text-danger text-center">{{$message}}</p>
            @enderror
            <div class="d-flex justify-content-center mt-4">
                <input type="submit" value='Enregistrer' class="btn btn-primary">
            </div>
        </form>
</div>

@endsection

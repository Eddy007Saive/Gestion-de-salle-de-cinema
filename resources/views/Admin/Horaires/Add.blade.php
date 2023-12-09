@extends('home')
@section('article')
<div class=" w-100 d-flex justify-content-center align-items-center column-gap-3 " style="height:100vh;">
    <div class="overflow-hidden col-5 d-flex justify-content-center rounded-4 p-4 shadow-lg " style="height: 400px ;width: 400px; ">

        <img src="" alt="" class="w-100 img-fluid image" style="border: 1px solid black; height: 100%;">

    </div>
    @isset($movie)
    <form action="{{route('Horaire.update')}}" method="post" enctype="multipart/form-data" class=" col-7  w-50 shadow-lg border-5  ">

        @else
        <form action="{{route('Horaire.store')}}" method="post" enctype="multipart/form-data" class=" col-7  w-50 shadow-lg border-5 p-3 rounded-4 ">

            @endisset

            @csrf

            <label for="movie" class="form-label">Film:</label>
            <select name="movie" id="" class="form-control selectmovie">
                @foreach ( $movies as $movie )
                <option value="{{ $movie['id'] }}">{{ $movie['titre']}}</option>
                @endforeach
            </select>

            <label for="salle" class="form-label">Salle :</label>
            <select name="salle" id="" class="form-control selectplace">
                @foreach ( $salles as $salle )
                <option value="{{ $salle['id'] }}">{{ $salle['nom']}}</option>
                @endforeach
            </select>

            <label for="titre" class="form-label">Date de diffusion:</label>
            <input type="date" name="date" id="" class="form-control" value="{{ $movie['titre'] ?? old('title')}}">

            @error('date')
            <p class="text-danger text-center">{{$message }}</p>
            @enderror

            <label for="real" class="form-label">Heure de diffusion:</label>
            <input type="time" name="heure" id="" class="form-control" value="{{ $movie['titre'] ?? old('heure')}}">

            @error('heure')
            <p class="text-danger text-center">{{$message }}</p>
            @enderror



            <label for="place" class="form-label ">Place disponible:</label>
            <input type="text" readonly name="place" id="" class="form-control place" value="{{$movie['duree'] ?? ''}}">

            @error('place')
            <p class="text-danger text-center">{{$message }}</p>
            @enderror






            <div class="d-flex w-100 justify-content-center mt-3">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>
        </form>
</div>
@endsection

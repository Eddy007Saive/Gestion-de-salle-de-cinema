@extends('home')
@section('article')
<div class=" row d-flex justify-content-center align-items-center">
    <div class="overflow-hidden col-5 d-flex justify-content-center rounded-4 p-4 shadow-lg " style="height: 400px ;width: 400px; ">
        @isset($movie)
        <img src="{{Storage::url('images/'.$movie['image'])}}" alt="" class="w-100  img-fluid ">
        @else
        <img src="" alt="" class="w-100" style="border: 1px solid black; height: 100%;">
        @endisset

    </div>
    <div class="col-7 d-flex justify-content-center ">
        @isset($movie)
        <form action="{{route('film.update')}}" method="post" enctype="multipart/form-data" class=" w-100 rounded-4 shadow-lg p-4 ">

            @else
            <form action="{{route('film.store')}}" method="post" enctype="multipart/form-data" class="w-100  rounded-4 shadow-lg p-4  ">

                @endisset

                @csrf
                <!-- Image  -->
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" id="" class="form-control">
                @error('image')
                <p class="text-danger text-center">{{$message }}</p>
                @enderror

                <!-- Titre -->
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" name="titre" id="" class="form-control" value="{{ $movie['titre'] ?? ''}}">
                @error('titre')
                <p class="text-danger text-center">{{$message }}</p>
                @enderror

                <!-- Réalisateur -->
                <label for="real" class="form-label">Réalisateur:</label>
                <input type="text" name="real" id="" class="form-control" value="{{ $movie['titre'] ?? ''}}">
                @error('real')
                <p class="text-danger text-center">{{$message }}</p>
                @enderror

                <!-- Date de Sortie -->
                <label for="DateSortie" class="form-label">Date de Sortie:</label>
                <input type="date" name="DateSortie" id="" class="form-control" value="{{ $movie['DateS'] ?? ''}}">
                @error('DateSortie')
                <p class="text-danger text-center">{{$message }} </p>
                @enderror

                <!-- Durée -->
                <label for="duree" class="form-label">Durée du film:</label>
                <input type="time" name="duree" id="" class="form-control" value="{{$movie['duree'] ?? ''}}">
                @error('duree')
                <p class="text-danger text-center">{{$message }}</p>
                @enderror

                <!-- Genre de film -->
                <label for="genre" class="form-label mt-4">Genre de film :</label>
                @foreach ( $genres as $genre )
                <input type="checkbox" name="genre[]" id="" class="form-input-check" value="{{$genre['id'] }}">
                <label for="genre[]">{{ $genre["genre"] }}</label>
                @endforeach

                <!-- Text areas -->
                <label for="descr" class="form-label mt-4">Description:</label>

                <textarea name="descri" class="form-control" cols="30" rows="10">{{$movie['descri'] ?? ''}}</textarea>
                @error('descri')
                <p class="text-danger text-center">{{$message }}</p>
                @enderror

                <!-- Hidden pour les image  -->
                <input type="hidden" name="image" value="{{$movie['image'] ?? ''}}">
                <input type="hidden" name="id" value="{{$movie['id'] ?? ''}}">
                <div class="d-flex w-100 justify-content-center mt-3">
                    <input type="submit" value="Enregistrer" class="btn btn-primary">
                </div>
            </form>
    </div>

</div>
@endsection

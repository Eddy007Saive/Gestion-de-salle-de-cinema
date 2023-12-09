@extends('home')
@section('article')
<div class=" w-100 d-flex justify-content-center align-items-center column-gap-3 " style="height:100vh;">
    <form action="{{ route('Genre.store')}}" method="POST" class="w-50">
    @csrf
        <div class="overflow-hidden col-5 d-flex justify-content-center rounded-4 p-4 shadow-lg " style="height: 400px ;width: 400px; ">

            <img src="" alt="" class="w-100 img-fluid image" style="border: 1px solid black; height: 100%;">

        </div>
        <label for="" class="fomr-label "> Film</label>
        <select name="movie" id="" class="form-control selectmovie mt-3">
            @foreach ( $movies as $mov )
            <option value="{{$mov->id}}">{{$mov->titre}}</option>
            @endforeach
        </select>
        @error("genre")
            <div class="text-danger">{{genre}}</div>
        @enderror

        <label for="genre" class="form-label">Genre du film</label>
        @foreach ( $genres as $genre )

        <label for="" class="form-check-label">{{ $genre }}</label>

        <input type="checkbox" class="form-check-input " value="{{$genre}}" name="genre[]" id="">
        @endforeach
        @error("genre")
            <div class="text-danger">{{genre}}</div>
        @enderror
        <input type="submit" value="Enregistrer" class="btn btn-primary  mt-3">
    </form>
</div>
@endsection

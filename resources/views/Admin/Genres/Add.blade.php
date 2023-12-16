@extends('home')
@section('article')
<div class=" w-100 d-flex justify-content-center align-items-center column-gap-3 " style="height:100vh;">
    <form action="{{ route('Genre.store')}}" method="POST" class="w-50 shadow-lg p-4">
    @csrf
    <label for="genre" class="form-label">Genre de Film :</label>
      <input type="text" name="genre" class="form-control" placeholder="Genre de film">
      @error('genre')
            <p class="alert alert-danger">{{genre}}</p>
      @enderror
      <input type="hidden" name="genreId" class="form-control" placeholder="Genre de film">

      <input type="submit" value="Enregistrer" class="btn btn-primary mt-4">
    </form>
    

@endsection

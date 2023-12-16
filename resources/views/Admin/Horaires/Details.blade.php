@extends('home')
@section('article')
<div class="w-100  h-100vh d-flex align-items-center">
<div class="row">
<div class="col-5 h-100 p-3 shadow-lg">
    <img src="{{Storage::url('images/'.$movie['image'])}}" class="img-fluid h-100" alt="">
</div>
<div class="col-7">
    <h1 class="text-center">{{ $movie->titre}}</h1>
    <p>{{ $movie->descri}}</p>
    <div class="d-flex column-gap-3">
        <p class="btn btn-warning">{{$dateD }}</p>
        <p class="btn btn-danger">{{$horaire->heureD }}</p>
        <p class="btn btn-sucess">Salle :  <span >{{$horaire->salle->nom }}</span> </p>

    </div>

</div>
</div>

</div>
@endsection

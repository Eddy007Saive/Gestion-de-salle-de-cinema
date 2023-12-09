@extends('home')
@section('article')
<section class="w-100 d-flex justify-content-center h-100vh align-items-center rounded-4">
    <div class="card w-50  h-75 shadow-lg ">
        <div class="card-img">
            <img src="{{Storage::url('images/'.$movie['image'])}}" alt="" class="img-fluid">
        </div>
        <div class="card-title text-center">{{$movie['titre']}}</div>
    </div>
</section>
@endsection

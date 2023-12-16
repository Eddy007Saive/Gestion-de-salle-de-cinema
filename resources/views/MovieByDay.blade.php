@extends('welcome')
@section('movie')
@foreach ($h as $horaire )
    <article class="row  w-100 p-4 mt-2  ">
        <div class="col-3  animate__animated animate__fadeInLeft wow shadow-lg" data-wow-duration="2s">
            <img src="{{Storage::url('images/'.$horaire->movie->image)}}" class="img-fluid  w-100" alt="">
        </div>
        <div class="col-9 animate__animated  animate__fadeInRight wow" data-wow-duration="3s">
            <h3> {{ $horaire->movie->titre}}</h3>
            <p>
                {{ substr($horaire->movie->descri,0,200)."..."}}
            </p>
            <div class="heure row  w-100">
                <ul class="col-4">
                    <li>Auteur: <span> {{ $horaire->movie->Auteur}}</span></li>
                    <li>Genre:
                        <span>
                            @foreach ($horaire->movie->genres as $genre )
                            {{ $genre->genre }}
                            @endforeach
                        </span>
                    </li>
                    <li>Date de Sortie : <span> {{ $horaire->movie->DateS}}</span></li>
                </ul>
                <div class="d-flex col-6 column-gap-4 ">
                    <p>Durée: <span class="badge bg-warning"> {{ $horaire->movie->duree}}</span></p>
                    <div>
                        <a class="btn btn-primary" href=""> <i class="fa-regular fa-eye"></i> Détails </a>
                    </div>
                    <div>
                    Date : <p class="badge bg-danger">{{ $horaire->DateD}} <span>{{$horaire->heureD}}</span></p>

                    </div>
                </div>

            </div>
        </div>

    </article>
    @endforeach
@endsection

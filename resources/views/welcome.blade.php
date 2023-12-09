@extends("layouts.app")
@section('content')
<header class="w-100">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image">
                    <img src="{{ asset('images/Iron.jpg') }}" alt="Los Angeles" class="d-block" style="width:100%">
                </div>
                <div class="carousel-caption position-absolute top-0">
                    <div class=" titre">
                        <h1 style="font-size: 150px;font-family:'Harry P';">CineFilm</h1>
                        <p>Nous somme ouvert <span style="background-color: orange;font-size: 20px;">7jours / 7</span></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="image">
                    <img src="{{ asset('images/captain marv.jpg') }}" alt="Chicago" class="d-block" style="width:100%">
                </div>
                <div class="">
                    <div class="carousel-caption position-absolute top-0">
                        <div class=" titre">
                            <h1 style="font-size: 150px;font-family:'Harry P';">CineFilm</h1>
                            <p>Nous somme ouvert <span style="background-color: orange;font-size: 20px;">7jours / 7</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item ">
                <div class="image">
                    <img src="{{ asset('images/spy.jpg') }}" alt="New York" class="d-block" style="width:100%">
                </div>

                <div class="carousel-caption position-absolute top-0">
                    <div class=" titre">
                        <h1 style="font-size: 150px;font-family:'Harry P';">CineFilm</h1>
                        <p>Nous somme ouvert <span style="background-color: orange;font-size: 20px;">7jours / 7</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button> -->
    </div>
</header>

<section class="row w-100 affiche p-4">
    <h1>Nouveautés</h1>
    <hr>
    @foreach ($movies as $movie )
    <div data-wow-duration="1s"class="  wow bounceInUp animate__animated  animate__flipInY card col-3 position-relative  d-flex justify-content-center shadow-lg rounded-4 overflow-hidden">
        <div class="card-img  overflow-hidden h-100 w-100">
            <img src="{{Storage::url('images/'.$movie->image)}}" class="img-fluid w-100 h-100" alt="">
        </div>
        <div class="desc rounded-4 position-absolute w-100 h-100 d-flex  flex-direction-column">
            <div class="card-title text-white w-100 h-50 text d-flex justify-content-center">
                <h2 class="btn btn-primary text-center h-25">{{$movie->titre}}</h2>
            </div>
            <div class="card-footer d-flex  w-100 justify-content-center h-50 align-items-end">
                <a href="{{route('film.view',['id'=>$movie->id] )}}" class="btn btn-warning h-25">Details</a>
            </div>
        </div>

    </div>
    @endforeach
</section>

<section class=" w-100 movieOfweek mt-3  ">
<hr>
<div class="row w-100 a ">
<h2 class="col-3 animate__animated  animate__fadeInUp  wow " data-wow-duration="2s">MoviesOfWeek</h2>
<nav class="navbar-nav w-100 col-6 animate__animated  animate__fadeInUp  wow" data-wow-duration="2s">
        <ul class="d-flex nav w-100 justify-content-center">

            <li class="nav-item"><a href="" class="nav-link">Lundi</a></li>
            <li class="nav-item"><a href="" class="nav-link">Mardi</a></li>
            <li class="nav-item"><a href="" class="nav-link">Mercredi</a></li>
            <li class="nav-item"><a href="" class="nav-link">Jeudi</a></li>
            <li class="nav-item"><a href="" class="nav-link">Vendredi</a></li>
            <li class="nav-item"><a href="" class="nav-link">Samedi</a></li>
            <li class="nav-item"><a href="" class="nav-link">Dimanche</a></li>
        </ul>
    </nav>
</div>



    <hr>
    <article class="row  w-100 p-4 ">
        @foreach ($projections as $projection )


        <div class="col-3 animate__animated animate__fadeInLeft wow " data-wow-duration="2s">
            <img src="{{Storage::url('images/'.$projection->image)}}" class="img-fluid  w-100" alt="">
        </div>
        <div class="col-9 animate__animated  animate__fadeInRight wow" data-wow-duration="3s">
            <h3> {{ $projection->titre}}</h3>
            <p>
                {{ substr($projection->descri,100)}}
            </p>
            <div class="heure  w-100">
                <ul>
                    <li>Auteur: <span> {{ $projection->Auteur}}</span></li>
                    <li>Genre: <span>Horreur</span></li>
                    <li>Date de Sortie : <span> {{ $projection->DateS}}</span></li>
                </ul>
                <div class="d-flex column-gap-4 w-100">
                    <p>Durée: <span class="btn btn-warning"> {{ $projection->duree}}</span></p>
                    <a class="btn btn-primary h-50" href=""> <i class="fa-regular fa-eye"></i>Voir plus </a>
                </div>

            </div>
        </div>
        @endforeach
    </article>
</section>

@endsection

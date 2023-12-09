@extends("layouts.app")
@section("content")
<aside  class="w-100 col-10  bg-dark container-fluid">
            <nav class=" d-flex w-100 justify-content-end align-items-center h-100 ">
                <ul class=" d-flex justify-content-end w-50 h-100 align-items-center list-unstyled ">
                    <li class="nav-item"><a href="{{route('Horaire') }}" class="nav-link"> <i class="fa-light fa-door-open"></i>Deconnexion</a></li>
                </ul>
            </nav>
</aside>
<div class="row  w-100">
    <aside class=" col-2 adminnav  ">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark  d-flex flex-column  " style="height: 100vh;">
            <a class="navbar-brand" href="javascript:void(0)">CINEFILM</a>
            <ul class=" navbar-nav list-unstyled d-flex flex-column nav-pills align-items-center justify-content-center w-100 h-100 row-gap-5">
                <li class="nav-item"><a href="" class="nav-link">Dashbord</a></li>
                <li class="nav-item"><a href="{{route('film') }}" class="nav-link">Film</a></li>
                <li class="nav-item"><a href="{{route('Salle') }}" class="nav-link">Salle</a></li>
                <li class="nav-item"><a href="{{route('Horaire') }}" class="nav-link">Horaire</a></li>
                <li class="nav-item"><a href="{{route('Genre') }}" class="nav-link">Genre</a></li>
            </ul>
        </nav>
    </aside>

    <section class="container-fluid d-flex col-10 ">
        <div class="w-100">
            @yield("admin")

        </div>

    </section>
</div>
@endsection

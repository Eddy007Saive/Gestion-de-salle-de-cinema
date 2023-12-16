@extends('home')
@section('article')
<div class="movie ">
    <div class=" link d-flex column-gap-5 align-items-center">
        <a href="{{route('film.create')}}" class="btn btn-success">Ajouter nouveau</a>
        <a href="{{route('film.create')}}" class="btn btn-danger">Supprimer la selection</a>
    </div>

    <div class=" shadow-lg bg-danger w-100 ">
        <table class="table w-100">
            <thead class="text-center">
                <th>Selected</th>
                <th>Titre</th>
                <th>Réalisateur</th>
                <th>Date de Sortie</th>
                <th>Durée</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($movies as $movie )
                    <tr>
                        <td>
                            <form action="" class="d-flex justify-content-center w-100  h-100 ">
                                <input type="checkbox" name="id" id="" class="form-check">
                            </form>
                        </td>
                        <td>{{ $movie["titre"] }}</td>
                        <td>{{ $movie["Auteur"] }}</td>
                        <td>{{ $movie["DateS"] }}</td>
                        <td>{{ $movie["duree"] }}</td>
                        <td class="d-flex column-gap-3 justify-content-center">
                            <a href="{{route('film.view',['id'=>$movie['id']] )}}" class="btn btn-warning">Views</a>
                            <a href="{{route('film.modify',['id'=>$movie['id']] )}}" class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@extends('home')
@section('article')
<div class="movie ">
    <div class=" link d-flex column-gap-5 align-items-center">

        <a href="{{route('Horaire.create')}}" class="btn btn-success">Ajouter nouveau</a>
        <a href="{{route('Horaire.create')}}" class="btn btn-danger">Supprimer la selection</a>

    </div>
    <div class=" shadow-lg  w-100 ">
        <table class="table w-100">
            <thead class="text-center">

                <th>Selected</th>
                <th>Date de diffusion</th>
                <th>Heure de diffusion</th>
                <th>Place disponible</th>
                <th>Film</th>
                <th>Salle</th>
                <th>Action</th>

            </thead>
            <tbody>
                @foreach ($horaires as $horaire )
                    <tr>
                        <td>
                            <form action="" class="d-flex justify-content-center w-100  h-100 ">
                                <input type="checkbox" name="id" id="" class="form-check">
                            </form>
                        </td>

                        <td class="text-center">{{ $horaire["DateD"] }}</td>
                        <td class="text-center">{{ $horaire["heureD"] }}</td>
                        <td class="text-center">{{ $horaire["placeDispo"] }}</td>
                        <td class="text-center">{{ $horaire->movie->titre}}</td>
                        <td class="text-center">{{ $horaire->salle->nom }}</td>


                        <td class="d-flex column-gap-3 justify-content-center">
                            <a href="{{route('Horaire.view',['id'=>$horaire['id']] )}}" class="btn btn-warning">Views</a>
                            <a href="{{route('Horaire.modify',['id'=>$horaire['id']] )}}" class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('home')
@section('article')
<div class="movie ">
    <div class=" link d-flex column-gap-5 align-items-center">
        <a href="{{route('Salle.create')}}" class="btn btn-success">Ajouter nouveau</a>
        <a href="{{route('Salle.create')}}" class="btn btn-danger">Supprimer la selection</a>
    </div>

    <div class=" shadow-lg  w-100 ">
        <table class="table w-100">
            <thead class="text-center">
                <th>Selected</th>
                <th>Nom</th>
                <th>Nombre de place</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($salles as $salle )
                    <tr>
                        <td>
                            <form action="" class="d-flex justify-content-center w-100  h-100 ">
                                <input type="checkbox" name="id" id="" class="form-check">
                            </form>
                        </td>
                        <td>{{ $salle["nom"] }}</td>
                        <td>{{ $salle["nbr_place"] }}</td>
                        <td class="d-flex column-gap-3 justify-content-center">
                            <a href="" class="btn btn-warning">Views</a>
                            <a href="{{route('Salle.modify',['id'=>$salle['id']] )}}" class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('home')
@section('article')
<div class="movie ">
    <div class=" link d-flex column-gap-5 align-items-center">

        <a href="{{route('Genre.create')}}" class="btn btn-success">Ajouter nouveau</a>
        <a href="{{route('Genre.create')}}" class="btn btn-danger">Supprimer la selection</a>

    </div>
    <div class=" shadow-lg  w-100 ">
        <table class="table w-100">
            <thead class="text-center">

                <th>Selected</th>
                <th>Genre</th>
                <th>Action</th>

            </thead>
            <tbody>
                @foreach ( $genres as $genre )
                <tr>
                    <td>
                        <form action="" class="d-flex justify-content-center w-100  h-100 ">
                            <input type="checkbox" name="id" id="" class="form-check">
                        </form>
                    </td>

                    <td>{{ $genre["genre"] }}</td>

                    <td>
                        <a href="{{route('Genre.modify',['id'=>$genre['id']] )}}" class="btn btn-warning">Views</a>
                        <a href="{{route('Genre.modify',['id'=>$genre['id']] )}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>


    </div>
    {{ $genres->links() }}
</div>

@endsection

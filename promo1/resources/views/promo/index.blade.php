@extends("application")
@section('page-title')
    Promos
@endsection
@section('page-content')
    <div class="container">

        <a class="btn btn-outline-success mt-3" href="{{ route("promo.create") }}">Add Promo</a>
        @if($search)
            <p class="mt-3">Search result for: {{ $search }}</p>
            <a href="{{route("promo.index")}}" class="mb-5">Return to list</a>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th scope="col">Promo</th>
                <th scope="col">Nom de l'Ecole / Universite</th>
                <th scope="col">Moodle de la promo</th>
                <th scope="col">Spécialité</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($promos as $p)
                <tr>
                    <td>{{ $p->promo }}</td>
                    <td>{{ $p->schoolname }}</td>
                    <td><a href="{{ $p->moodle }}">Learn More</a></td>
                    <td>{{ $p->specialite }}</td>
                    <td class="d-flex" style="size: inherit">
                        <a class="btn btn-outline-success mr-2" href="{{ route("promo.show", $p) }}">Show</a>
                        <a class="btn btn-outline-info mr-2" href="{{ route("promo.edit", $p) }}">Edit</a>
                        <form action="{{ route("promo.destroy", $p->id) }}" method="post">
                            <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection

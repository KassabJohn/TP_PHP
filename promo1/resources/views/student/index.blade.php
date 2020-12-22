@extends("application")
@section('page-title')
    Student
@endsection
@section('page-content')
    <div class="container">

        @if($search)
            <p class="mt-3">Search result for: {{ $search }}</p>
            <a href="{{route("promo.index")}}" class="mb-5">Return to list</a>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Work at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $s)
                <tr>
                    <td>{{ $s->firstname }}</td>
                    <td>{{ $s->lastname }}</td>
                    <td>{{ $s->promo['schoolname'] }}</td>
                    <td class="d-flex" style="size: inherit">
                        <a class="btn btn-outline-success mr-2" href="{{ route("student.show", $s) }}">Show</a>
                        <a class="btn btn-outline-info mr-2" href="{{ route("student.edit", $s) }}">Edit</a>
                        <form action="{{ route("student.destroy", $s->id) }}" method="post">
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

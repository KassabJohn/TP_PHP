@extends('application')

@section('page-title')
    {{ $student->firstname." ".$student->lastname }}
@endsection

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $student->firstname." ".$student->lastname }}</h5>
                <p class="card-text">{{ $student->email }}</p>
                <h6 class="card-subtitle mb-2 text-muted">Working at : <a href="{{ route("promo.show", $student->promo->id) }}">{{ $student->promo->schoolname }}</a></h6>
                <p class="card-text">{{ $student->promo->description }}</p>

                <p class="card-text">
                    <strong>Classmates: </strong>
                </p>
                <ul class="list-group list-group-flush mb-3">
                    @foreach($student->promo->students as $s)
                        @if($s->firstname != $student->firstname && $s->lastname != $student->lastname)
                            <li class="list-group-item">
                                <a href="{{ route("student.show", $s) }}">{{ "". $s->firstname." ".$s->lastname }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="d-flex">
                    <a class="btn btn-outline-info mr-2" href="{{ route("student.edit", $student) }}">Edit</a>
                    <form action="{{ route("student.destroy", $student->id) }}" method="post">
                        <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

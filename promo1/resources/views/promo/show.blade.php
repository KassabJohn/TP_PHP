@extends('application')

@section('page-title')
    {{ $p->promo }}
@endsection

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $p->promo }} - {{ $p->schoolname }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $p->specialite }}</h6>
                <p class="card-text">{{ $p->description }}</p>
                <p class="card-text">
                    <strong>Moodle de la promo:</strong>
                    {{ $p->moodle }}
                </p>
                <p class="card-text">
                    <strong>Students: </strong>
                </p>
                <ul class="list-group list-group-flush mb-3">
                    @foreach($p->students as $s)
                        <li class="list-group-item">
                            <a href="{{ route("student.show", $s) }}">{{ "". $s->firstname." ".$s->lastname. " | ".$s->email}}</a>
                        </li>
                    @endforeach
                </ul>
                <p class="card-text">
                    <strong>Modules: </strong>
                </p>
                <ul class="list-group list-group-flush mb-3">
                    @foreach($p->modules as $module)
                        <li class="list-group-item">
                            <a href="{{ route("module.show", $module) }}"> {{ $module->promo }} </a>
                        </li>
                    @endforeach
                </ul>
                <div class="d-flex">
                    <a class="btn btn-outline-primary mr-2" href="{{ route("student.create", ["promo"=>$p]) }}">Add Students</a>
                    <a class="btn btn-outline-primary mr-2" href="{{ route("module.index", ["promo"=>$p]) }}">Add Module</a>
                    <a class="btn btn-outline-info mr-2" href="{{ route("promo.edit", $p) }}">Edit</a>
                    <form action="{{ route("promo.destroy", $p->id) }}" method="post">
                        <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

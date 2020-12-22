@extends("application")

@section("page-title")
    {{ $current_module->promo }}
@endsection

@section("page-content")
    <div class="container d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ "Module : ".$current_module->promo }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ "description : ".$current_module->description }}</h6>

                <p class="mt-5">Promo link to this module</p>
                <ul class="list-group mb-5">
                    @foreach($current_module->promos as $module_promo)
                        <li class="list-group-item" aria-current="true">
                            <a href="{{ route("promo.show", $module_promo->id) }}">{{ $module_promo->promo }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="d-flex">
                    <a href="{{ route("module.edit", $current_module) }}"
                       class="btn btn-outline-info card-link mr-3">Edit</a>
                    <form action="{{ route("module.destroy", $current_module) }}" method="post">
                        <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@extends("module.form")

@section("title")
    Edit Module
@endsection

@section("action")
    {{ route("module.update", $editing_module) }}
@endsection

@section("method")
    @method("PUT")
@endsection

@section("promo")
    {{ $editing_module->promo }}
@endsection

@section("description")
    {{ $editing_module->description }}
@endsection

@section("promos-list")
    @foreach($promos as $promo)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="promo-{{ $promo->id }}"
                   value="{{ $promo->id }}" name="promos[]"
                   @foreach($editing_module->promos as $module_promo)
                   @if($module_promo->id == $promo->id) checked @endif
                @endforeach
            >
            <label class="form-check-label" for="promo-{{ $promo->id }}">{{ $promo->promo }}</label>
        </div>
    @endforeach
@endsection

@section("students-list")
    @foreach($students as $student)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="student-{{ $student->id }}"
                   value="{{ $student->id }}" name="students[]"
                   @foreach($editing_module->students as $module_student)
                   @if($module_student->id == $student->id) checked @endif
                @endforeach
            >
            <label class="form-check-label" for="student-{{ $student->id }}">{{ $student->firstname }}</label>
        </div>
    @endforeach
@endsection

@extends("module.form")

@section("title")
    Create Module
@endsection

@section("action")
    {{ route("module.store", ["promo_id" => $current_promo_id]) }}
@endsection

@section("promos-list")
    @foreach($promos as $promo)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="promo-{{ $promo->id }}"
                   value="{{ $promo->id }}" name="promos[]"
                   @if($current_promo_id != null && $promo->id == $current_promo_id) checked @endif>
            <label class="form-check-label" for="promo-{{ $promo->id }}">{{ $promo->promo }}</label>
        </div>
    @endforeach
@endsection

@section("students-list")
    @foreach($students as $student)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="student-{{ $student->id }}"
                   value="{{ $student->id }}" name="students[]"
                   @if($current_student_id != null && $student->id == $current_student_id) checked @endif>
            <label class="form-check-label" for="student-{{ $student->id }}">{{ $student->firstname }}</label>
        </div>
    @endforeach
@endsection

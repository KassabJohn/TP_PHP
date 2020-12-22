<form method="POST"
      action="{{route("promo.store_modules", ["promo_id" => $current_promo_id])}}">
    @csrf
    @foreach($modules as $module)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="modules-{{ $module->id }}"
                   value="{{ $module->id }}" name="modules[]"
                   @foreach($module->promos as $module_promo)
                   @if($module_promo->id == $current_promo_id) checked @endif
                @endforeach>
{{--            @foreach($module->students as $module_student)--}}
{{--                @if($module_student->id == $current_student_id) checked @endif--}}
{{--            @endforeach>--}}
            <label class="form-check-label"
                   for="module-{{ $module->id }}">{{ $module->promo }}</label>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    <a type="submit" href="{{ route("module.create", ["promo_id"=> $current_promo_id]) }}"
       class="btn btn-primary">Create</a>
</form>

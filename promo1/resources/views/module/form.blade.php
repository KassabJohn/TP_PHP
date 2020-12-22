@extends('application')

@section('page-title')
    @yield("title")
@endsection

@section('page-content')
    @if(!isset($current_promo_id)) {{ $current_promo_id = null }}  @endif
    @if(!isset($current_student_id)) {{ $current_student_id = null }}  @endif
    <div class="container">
        <form method="POST" action="@yield("action")">
            @csrf
            @yield("method")
            <div class="mb-3">
                <label for="promo" class="form-label">Module's name</label>
                <input type="text" required class="form-control" id="promo" name="promo" value="@yield("promo")">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Module's description</label>
                <input type="text" required class="form-control" id="description" name="description" value="@yield("description")">
            </div>
            @yield("promos-list")
            @yield("students-list")
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

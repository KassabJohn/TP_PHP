@extends('application')
@section('page-title')Modules @endsection
@section('page-content')
    <div class="container">
        @if(isset($current_promo_id))
            @include("module.parts.form_create")
        @else
            @include("module.parts.list")
        @endif
    </div>
@endsection

@extends("promo.form")

@section('page-title')
    Edit Promo
@endsection

@section('action') {{ route('promo.update', $p) }} @endsection

@section("method")
    @method("PUT")
@endsection



{{--Filling inputs--}}

@section("promo") {{ $p->promo }} @endsection

@section("moodle") {{ $p->moodle }} @endsection

@section("description") {{ $p->description }} @endsection

@section("schoolname") {{ $p->schoolname }} @endsection

@section("specialite") {{ $p->specialite }} @endsection

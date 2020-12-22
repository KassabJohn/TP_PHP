@extends('student.form')
@section('page-title')
    Create Student
@endsection
@section('action'){{ route('student.store') }}@endsection
@section('promo'){{ $promo->promo }}@endsection
@section('promo_id'){{ $promo->id }}@endsection

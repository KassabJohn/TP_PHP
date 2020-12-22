@extends("student.form")

@section("page-title")
    Edit Student
@endsection

@section("action") {{ route("student.update", $student) }} @endsection

@section('method')
    @method('PUT')
@endsection

@section("firstname") {{ $student->firstname }} @endsection

@section("lastname") {{ $student->lastname }} @endsection

@section("email") {{ $student->email }} @endsection


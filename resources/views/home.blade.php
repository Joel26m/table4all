@extends('layouts.mainLogin')

@section('titulo.', 'homeROL')

@section('contenido')
{{$user->rol}}
@endsection
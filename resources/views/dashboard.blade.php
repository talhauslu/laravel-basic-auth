@extends('layout')

@section('title', 'Dashboard')

@section('content')
    @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <h1>olduuuu</h1>


    <p>{{$data}}</p>


    {{-- @foreach ($data as $item)
        <p>{{$item}}</p>
    @endforeach --}}



@endsection

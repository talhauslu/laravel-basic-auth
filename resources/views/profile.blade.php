@extends('layout')

@section('title', 'Profil')

@section('content')
    <h1>Profil</h1>


    <p>Kullanıcı ismi : {{$data['username']}}</p>
    <p>Email adresi : {{$data['email']}}</p>
    <p>Durum : {{$data['active']==1 ? 'Aktif':'Pasif' }}</p>


@endsection

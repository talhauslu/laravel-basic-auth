@extends('layout')

@section('title', 'Profil')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Profil</h1>


    <p>Kullanıcı ismi : {{ $data['username'] }}</p>
    <p>Email adresi : {{ $data['email'] }}</p>
    <p>Durum : {{ $data['active'] == 1 ? 'Aktif' : 'Pasif' }}</p>


@endsection

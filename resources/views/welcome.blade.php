@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome, {{ $user->name }}</h1>
        <p class="lead">Gracias por tu preferencia.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
@endsection

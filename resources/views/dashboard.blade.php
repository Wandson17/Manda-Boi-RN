@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')

    <h1>Dashboard</h1>
    
    <h2>Usuario: {{ Auth::user()->name }}</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="Sair">
    </form>

@endsection

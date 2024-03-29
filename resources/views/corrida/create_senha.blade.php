@extends('layouts.base')

@section('title', 'Criar senha de corrida')

@section('content')

    @include('layouts.navbar')

    {{-- @if ($errors->any())
        {{ dd($errors) }}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <main>

        <form action="{{ route('senha.store') }}" method="post">

            @csrf

            <input type="hidden" name="corrida_id" id="corrida_id" value="{{ $corrida->id }}">

            <select name="categoria" class="@error('categoria') is-invalid @enderror" id="categoria">
                @php
                    $categorias = \App\Models\CategoriaSenha::all();
                @endphp
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach

            </select>
            @error('categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="de">De</label>
            <input type="number" class="@error('de') is-invalid @enderror" name="de" id="de">
            @error('de')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="ate">Até</label>
            <input type="number" class="@error('ate') is-invalid @enderror" name="ate" id="ate">
            @error('ate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="valor">Valor</label>
            <input type="number" class=" @error('valor') is-invalid @enderror" name="valor" id="valor">
            @error('valor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="submit" value="Criar">

        </form>

    </main>

@endsection

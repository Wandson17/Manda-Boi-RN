@extends('layouts.base')

@section('title', 'Manda Boi - RN')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    @include('layouts.navbar')

    <section class="showcase">
        <div class="search-bar">
            <div class="col-md-5">
                <div class="input-group">
                    <input class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                        placeholder="Pesquise aqui...">
                    <div class="td" id="s-cover">
                        <button type="submit" class="button">
                            <div id="s-circle"></div>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center m-5 title" style="font-size: 52px;">VAQUEJADAS</h2>
    </section>

    <section class="container-fluid pt-1 pb-1">
        <div class="container">
            <div class="row gy-3 my-2">
                <div class="row m-1">
                    @php
                        $corridas = App\Models\Corrida::with('cityy')->get();
                    @endphp

                    @foreach ($corridas as $corrida)
                        <div class="col-sm-4 m-6 mb-sm-0">
                            <div class="card mb-5 bg-dark text-light text-center" style="max-width: 470px;">
                                <div class="row g-0 text-center">
                                    <div class="col-md-5 m-1">
                                        <img src="{{ asset('storage/' . $corrida->photo) }}" class="rounded mt-1"
                                            style="width: 150px; height: 155px;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <p class="card-title fw-bold" style="font-size: 14px;">{{ $corrida->park_name }}
                                            </p>
                                            </p>
                                            <p class="card-title fw-bold" style="font-size: 9px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                    fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                                </svg>
                                                {{$corrida->cityy->name}}
                                            </p>
                                            <p class="card-title fw-bold mt-4" style="font-size: 10px;">
                                                De {{ \Carbon\Carbon::parse($corrida->data_inicio)->format('d/m') }}
                                                a {{ \Carbon\Carbon::parse($corrida->data_fim)->format('d/m') }}
                                            </p>
                                            <div class="btn-group btn-group-sm" role="group"
                                                aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-warning" onclick="window.location.href='{{ route('corrida.show', $corrida->id) }}'">Comprar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="text-center m-5 title" style="font-size: 52px;">EVENTOS</h2>
    </section>

    <section class="container-fluid pt-1 pb-1">
        <div class="container">
            <div class="row gy-3 my-2">
                <div class="row m-1">
                    @php
                        $festas = App\Models\Festa::where('active', 1)->get();
                    @endphp

                    @foreach ($festas as $festa)
                        <div class="col-sm-4 m-6 mb-sm-0">
                            <div class="card mb-5 bg-dark text-light text-center" style="max-width: 470px;">
                                <div class="row g-0 text-center">
                                    <div class="col-md-5 m-1">
                                        <img src="{{ asset('storage/' . $festa->photo) }}" class="rounded mt-1"
                                            style="width: 150px; height: 155px;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <p class="card-title fw-bold" style="font-size: 14px;">{{ $festa->nome }}
                                            </p>
                                            </p>
                                            <p class="card-title fw-bold" style="font-size: 9px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                    fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                                </svg>
                                                {{$festa->endereco}}
                                            </p>
                                            <p class="card-title fw-bold mt-4" style="font-size: 10px;">
                                                Ínicio {{ \Carbon\Carbon::parse($festa->data_inicio)->format('d/m') }}
                                                as {{ \Carbon\Carbon::parse($festa->time)->format('H:i') }}
                                            </p>
                                            <div class="btn-group btn-group-sm" role="group"
                                                aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-warning" onclick="window.location.href='{{ route('festa.show', $festa->id) }}'">Comprar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')

@endsection

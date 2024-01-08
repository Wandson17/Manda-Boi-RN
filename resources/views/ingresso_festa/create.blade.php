@extends('layouts.base')

@section('title', 'Comprar ingresso')

@section('head')
    <style>
        .card-body {
            height: 40vh;
            width: 600px;
        }
    </style>
@endsection

@section('content')

    @include('layouts.navbar')

    <main>

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                        <div class="d-flex justify-content-center ">

                        </div>

                        <div class="card mb-3 bg-light navbar-light bg-opacity-75 ">

                            <div class="card-body">
                                <div class=" mb-4 w-100  d-flex justify-content-center align-content-center">

                                    <h4 class="d-flex justify-content-center align-content-center "><b>Ingressos</b></h4>
                                </div>

                                <form action="{{ route('ingresso.usuario.store') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="festa_id" id="festa_id" value="{{ $festa->id }}">

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label" for="ingresso">Tipo de ingresso *</label>
                                            <select class="form-control @error('ingresso') is-invalid @enderror" name="ingresso" id="ingresso">
                                                @foreach ($ingressos as $ingresso)
                                                    <option value="{{ $ingresso->id }}">
                                                        {{ $ingresso->categoriaIngresso->categoria }} -
                                                        R${{ $ingresso->preco }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('ingresso')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label" for="forma_pagamento">Forma de pagamento *</label>
                                            <select class="form-control @error('forma_pagemento') is-invalid @enderror" name="forma_pagamento" id="forma_pagamento">
                                                @foreach ($formas_pagamento as $forma_pagamento)
                                                    <option value="{{ $forma_pagamento->id }}">
                                                        {{ $forma_pagamento->forma_pagamento }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('forma_pagamento')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center mt-2">
                                        <input type="submit" class="btn" style="background-color: #FFB17B;"
                                            value="Comprar ingresso">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

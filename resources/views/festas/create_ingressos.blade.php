@extends('layouts.base')

@section('title', 'Cadastrar Ingressos de evento')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        li {
    list-style-type: none;
}
.card-body {
    height: 120vh;
}
    </style>
@endsection

@section('body-class', 'background')

@section('content')

    @include('layouts.navbar')

    <main>

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                        <div class="card mb-3 bg-light navbar-light bg-opacity-75 ">

                            <div class="card-body">
                                <div class=" mb-4 w-100  d-flex justify-content-center align-content-center">

                                    <h4 class="d-flex justify-content-center align-content-center "><b>Ingressos</b></h4>
                                </div>

                                <form id="formulario" action="{{ route('ingresso.store', $festa->id) }}" validate method="post"
                                    class="row g-3 needs-validation">

                                    @csrf

                                    <fieldset class="row d-flex justify-content-center">
                                        <div class="col-4">
                                            <label for="cat_{{ $categorias[0]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="text"
                                                class="form-control @error('cat_' . $categorias[0]->categoria) is-invalid @enderror"
                                                id="cat_{{ $categorias[0]->categoria }}"
                                                name="cat_{{ $categorias[0]->categoria }}"
                                                value="{{ $categorias[0]->categoria }}" readonly>
                                            @error('cat_' . $categorias[0]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-2">
                                            <label for="value_{{ $categorias[0]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="number"
                                                class="form-control @error('value_' . $categorias[0]->categoria) is-invalid @enderror"
                                                id="value_{{ $categorias[0]->categoria }}" placeholder="Valor (R$')"
                                                name="value_{{ $categorias[0]->categoria }}"
                                                value="{{ old('value_' . $categorias[0]->categoria) }}">
                                            @error('value_' . $categorias[0]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-2">
                                            <label for="observation_{{ $categorias[0]->categoria }}"
                                                class="form-label">Observação</label>
                                            <input type="text" name="observation_{{ $categorias[0]->categoria }}"
                                                id="observation_{{ $categorias[0]->categoria }}"
                                                class="form-control @error('observation_' . $categorias[0]->categoria) is-invalid @enderror"
                                                value="{{ old('observation_' . $categorias[0]->categoria) }}"
                                                placeholder="Opcional">
                                            @error('observation_' . $categorias[0]->categoria)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </fieldset>

                                    <fieldset class="row d-flex justify-content-center">
                                        <div class="col-4">
                                            <label for="cat_{{ $categorias[1]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="text"
                                                class="form-control @error('cat_' . $categorias[1]->categoria) is-invalid @enderror"
                                                id="cat_{{ $categorias[1]->categoria }}"
                                                name="cat_{{ $categorias[1]->categoria }}"
                                                value="{{ $categorias[1]->categoria }}" readonly>
                                            @error('cat_' . $categorias[1]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-2">
                                            <label for="value_{{ $categorias[1]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="number"
                                                class="form-control @error('value_' . $categorias[1]->categoria) is-invalid @enderror"
                                                id="value_{{ $categorias[1]->categoria }}" placeholder="Valor (R$')"
                                                name="value_{{ $categorias[1]->categoria }}"
                                                value="{{ old('value_' . $categorias[1]->categoria) }}">
                                            @error('value_' . $categorias[1]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-2">
                                            <label for="observation_{{ $categorias[1]->categoria }}"
                                                class="form-label">Observação</label>
                                            <input type="text" name="observation_{{ $categorias[1]->categoria }}"
                                                id="observation_{{ $categorias[1]->categoria }}"
                                                class="form-control @error('observation_' . $categorias[1]->categoria) is-invalid @enderror"
                                                value="{{ old('observation_' . $categorias[1]->categoria) }}"
                                                placeholder="Opcional">
                                            @error('observation_' . $categorias[1]->categoria)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </fieldset>

                                    <fieldset class="row d-flex justify-content-center">
                                        <div class="col-4">
                                            <label for="cat_{{ $categorias[2]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="text"
                                                class="form-control @error('cat_' . $categorias[2]->categoria) is-invalid @enderror"
                                                id="cat_{{ $categorias[2]->categoria }}"
                                                name="cat_{{ $categorias[2]->categoria }}"
                                                value="{{ $categorias[2]->categoria }}" readonly>
                                            @error('cat_' . $categorias[2]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-2">
                                            <label for="value_{{ $categorias[2]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="number"
                                                class="form-control @error('value_' . $categorias[2]->categoria) is-invalid @enderror"
                                                id="value_{{ $categorias[2]->categoria }}" placeholder="Valor (R$')"
                                                name="value_{{ $categorias[2]->categoria }}"
                                                value="{{ old('value_' . $categorias[2]->categoria) }}">
                                            @error('value_' . $categorias[2]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-2">
                                            <label for="observation_{{ $categorias[2]->categoria }}"
                                                class="form-label">Observação</label>
                                            <input type="text" name="observation_{{ $categorias[2]->categoria }}"
                                                id="observation_{{ $categorias[2]->categoria }}"
                                                class="form-control @error('observation_' . $categorias[2]->categoria) is-invalid @enderror"
                                                value="{{ old('observation_' . $categorias[2]->categoria) }}"
                                                placeholder="Opcional">
                                            @error('observation_' . $categorias[2]->categoria)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </fieldset>

                                    <fieldset class="row d-flex justify-content-center">
                                        <div class="col-4">
                                            <label for="cat_{{ $categorias[3]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="text"
                                                class="form-control @error('cat_' . $categorias[3]->categoria) is-invalid @enderror"
                                                id="cat_{{ $categorias[3]->categoria }}"
                                                name="cat_{{ $categorias[3]->categoria }}"
                                                value="{{ $categorias[3]->categoria }}" readonly>
                                            @error('cat_' . $categorias[3]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-2">
                                            <label for="value_{{ $categorias[1]->categoria }}"
                                                class="form-label"><b>Categoria</b></label>
                                            <input type="number"
                                                class="form-control @error('value_' . $categorias[3]->categoria) is-invalid @enderror"
                                                id="value_{{ $categorias[3]->categoria }}" placeholder="Valor (R$')"
                                                name="value_{{ $categorias[3]->categoria }}"
                                                value="{{ old('value_' . $categorias[3]->categoria) }}">
                                            @error('value_' . $categorias[3]->categoria)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-2">
                                            <label for="observation_{{ $categorias[3]->categoria }}"
                                                class="form-label">Observação</label>
                                            <input type="text" name="observation_{{ $categorias[3]->categoria }}"
                                                id="observation_{{ $categorias[3]->categoria }}"
                                                class="form-control @error('observation_' . $categorias[3]->categoria) is-invalid @enderror"
                                                value="{{ old('observation_' . $categorias[3]->categoria) }}"
                                                placeholder="Opcional">
                                            @error('observation_' . $categorias[3]->categoria)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </fieldset>

                                    <div class="text-center">
                                        <button class="btn w-50" style="background-color: #FFB17B;">Salvar</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}


        {{-- <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container ">
                <div class="row justify-content-center ">

                </div>

                <form action="{{ route('ingresso.store', $festa->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="festa_id" value="{{ $festa->id }}">
                        
                        <div class="row">
                            <div class="col">
                                <input type="text" name="cat_{{ $categorias[0]->categoria }}" value="{{ $categorias[0]->categoria }}" readonly>
                                @error('cat_' . $categorias[0]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="number" name="value_{{ $categorias[0]->categoria }}" value="{{old('value_'.$categorias[0]->categoria)}}">
                                @error('value_' . $categorias[0]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="observation_{{ $categorias[0]->categoria }}" value="{{old('observation_'.$categorias[0]->categoria)}}">
                                @error('observation_' . $categorias[0]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col">
                                <input type="text" name="cat_{{ $categorias[1]->categoria }}" value="{{ $categorias[1]->categoria }}" readonly>
                                @error('cat_' . $categorias[1]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="number" name="value_{{ $categorias[1]->categoria }}" value="{{old('value_'.$categorias[1]->categoria)}}">
                                @error('value_' . $categorias[1]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="observation_{{ $categorias[1]->categoria }}" value="{{old('observation_'.$categorias[1]->categoria)}}">
                                @error('observation_' . $categorias[1]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col">
                                <input type="text" name="cat_{{ $categorias[2]->categoria }}" value="{{ $categorias[2]->categoria }}" readonly>
                                @error('cat_' . $categorias[2]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="number" name="value_{{ $categorias[2]->categoria }}" value="{{old('value_'.$categorias[2]->categoria)}}">
                                @error('value_' . $categorias[2]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="observation_{{ $categorias[2]->categoria }}" value="{{old('observation_'.$categorias[2]->categoria)}}">
                                @error('observation_' . $categorias[2]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col">
                                <input type="text" name="cat_{{ $categorias[3]->categoria }}" value="{{ $categorias[3]->categoria }}" readonly>
                                @error('cat_' . $categorias[3]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="number" name="value_{{ $categorias[3]->categoria }}" value="{{old('value_'.$categorias[3]->categoria)}}">
                                @error('value_' . $categorias[3]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="observation_{{ $categorias[3]->categoria }}" value="{{old('observation_'.$categorias[3]->categoria)}}">
                                @error('observation_' . $categorias[3]->categoria)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary">Adicionar ingressos</button>
                </form>

            </div>

        </section> --}}

    </main>

@endsection

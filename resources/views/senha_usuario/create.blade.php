@extends('layouts.base')

@section('title', 'Comprar senha')

@section('head')

    <style>
        .links-form {
            background-color: blue;
            color: white;
            text-decoration: none;
        }

        .senha-grid {
            display: grid;
            grid-template-columns: repeat(15, 1fr);
            /* 10 colunas no grid */
            gap: 5px;
            margin: 0;
            padding: 0;
        }

        .senha {
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border: 1px solid #ddd;
            margin: 0;
            padding: 0;
        }

        .senha:hover {
            cursor: pointer;
        }

        .senha-comprada {
            background-color: red;
            color: white;
        }

        .senha-selecionada {
            background-color: green;
            color: white;
        }

        .card-body {
            height: 120vh;
        }

    </style>

@endsection

@section('content')

    @include('layouts.navbar')

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container ">
            <div class="row justify-content-center ">
                <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center ">
                    <div class="card mb-3 bg-light navbar-light bg-opacity-75 rounded">

                        <div class="card-body">
                            <div class=" mb-4 w-100  d-flex justify-content-center align-content-center">

                                <h4 class="d-flex justify-content-center align-content-center "><b>Ingressos</b></h4>
                            </div>

                            <form id="formulario" action="{{ route('senha.usuario.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="corrida_id" id="corrida_id" value="{{ $corrida->id }}">

                                <h1>Dados do(a) vaqueiro(a)</h1>
                                <fieldset class="row">
                                    <div class="col-2">
                                        <label for="nome_vaqueiro">Nome *</label>
                                        <input type="text" value="{{ old('nome_vaqueiro') }}" class="form-control @error('nome_vaqueiro') is-invalid @enderror" name="nome_vaqueiro" id="nome_vaqueiro"
                                            placeholder="Nome completo">
                                        @error('nome_vaqueiro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-2">
                                        <label for="apelido">Apelido *</label>
                                        <input type="text" value="{{ old('apelido') }}" class="form-control @error('apelido') is-invalid @enderror" name="apelido" id="apelido"
                                            placeholder="Apelido">
                                            @error('apelido')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-2">
                                        <label for="cpf">CPF *</label>
                                        <input type="text" value="{{ old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror" name="cpf" id="cpf"
                                            placeholder="000.000.000-00">
                                            @error('cpf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="cidade">Cidade *</label>
                                        <select class="form-control @error('cidade') is-invalid @enderror" name="cidade" id="cidade">

                                            @php
                                                $cidades = \App\Models\City::all();
                                            @endphp

                                            @foreach ($cidades as $cidade)
                                                <option value="{{ $cidade->id }}">{{ $cidade->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('cidade')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </fieldset>

                                <h1>Dados da senha</h1>
                                <fieldset class="row">
                                    <div class="col-2">
                                        <label for="categoria">Categoria *</label>
                                        <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">

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
                                    </div>
                                    <div class="col-3">
                                        <label for="cavalo_puxador">Cavalo puxador *</label>
                                        <input type="text" value="{{ old('cavalo_puxador') }}" class="form-control @error('cavalo_puxador') is-invalid @enderror" name="cavalo_puxador"
                                            id="cavalo puxador">
                                            @error('cavalo_puxador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-2">

                                        <label for="esteireiro">Esteireiro *</label>
                                        <input type="text" value="{{ old('esteireiro') }}" class="form-control @error('esteireiro') is-invalid @enderror" name="esteireiro" id="esteireiro"
                                            placeholder="Nome do esteireiro">
                                            @error('esteireiro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">

                                        <label for="apelido_esteira">Apelido do Esteireiro *</label>
                                        <input type="text" value="{{ old('apelido_esteira') }}" class="form-control @error('apelido_esteira') is-invalid @enderror" name="apelido_esteira"
                                            id="apelido_esteira" placeholder="Apelido do esteireiro">
                                            @error('apelido_esteira')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <label for="cavalo_esteireiro">Cavalo esteireiro *</label>
                                        <input type="text" value="{{ old('cavalo_esteireiro') }}" class="form-control @error('cavalo_esteireiro') is-invalid @enderror" name="cavalo_esteireiro"
                                            id="cavalo_esteireiro">
                                            @error('cavalo_esteireiro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="representacao">Representação (cidade) *</label>
                                        <select name="representacao" class="form-control @error('representacao') is-invalid @enderror" id="representacao">

                                            @foreach ($cidades as $cidade)
                                                <option value="{{ $cidade->id }}">{{ $cidade->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('representacao')

                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>

                                    <div class="col-3">
                                        <label for="n_senha">Nº da senha *</label>
                                        <input type="number" value="{{ old('n_senha') }}" class="form-control @error('n_senha') is-invalid @enderror" name="n_senha" id="n_senha"
                                            placeholder="0" readonly>
                                            @error('n_senha')

                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>

                                    <div class="">
                                        <label for="forma_pagamento">Forma de pagamento *</label>
                                        <select name="forma_pagamento" class="form-control @error('forma_pagamento') is-invalid @enderror" id="forma_pagamento">

                                            @php
                                                $formas_pagamento = \App\Models\FormaPagamento::all();
                                            @endphp

                                            @foreach ($formas_pagamento as $forma_pagamento)
                                                <option value="{{ $forma_pagamento->id }}">
                                                    {{ $forma_pagamento->forma_pagamento }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('forma_pagamento')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div>

                                        <div class="container mt-4">
                                            <h2 class="mb-3">Mapa de Senhas</h2>

                                            <div class="row mx-0">
                                                <div class="senha-grid">

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>

                                <div class="text-center mt-3">
                                    <input type="submit" class="btn btn-primary" value="Comprar senha">
                                </div>
                            </form>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}


                            <script>
                                $(document).ready(function() {

                                    $('#categoria').on('change', function() {
                                        const senhas = getSenhas()
                                            .then(response => {
                                                $('.senha-grid').empty();
                                                montarMapa(response.senhas.de, response.senhas.ate, response.senhasCompradas);
                                            }).catch(error => {})
                                    });

                                    montarMapaInicial();

                                });

                                $(document).on('click', '.senha', function() {
                                    const numeroSenha = $(this).data('numero');

                                    if (!$(this).hasClass('senha-comprada')) {
                                        $('.senha').removeClass('senha-selecionada');
                                        $(this).addClass('senha-selecionada');
                                        $('#n_senha').val(numeroSenha);
                                    }
                                });

                                const montarMapa = (de, ate, senhasCompradas = []) => {
                                    const senhaGrid = $('.senha-grid');
                                    senhaGrid.empty();

                                    for (let i = de; i <= ate; i++) {
                                        const senhaDiv = $('<div></div>')
                                            .addClass(`senha ${senhasCompradas.includes(i) ? 'senha-comprada' : ''}`)
                                            .attr('data-numero', i)
                                            .text(i);

                                        senhaGrid.append(senhaDiv);
                                    }
                                }

                                const montarMapaInicial = () => {
                                    getSenhas().then(response => {
                                        montarMapa(response.senhas.de, response.senhas.ate, response.senhasCompradas);
                                    }).catch(error => {})
                                }

                                const getSenhas = async () => {
                                    $('#n_senha').val(0);
                                    const corrida = $('#corrida_id').val();
                                    const categoria = $('#categoria').val();

                                    const response = await $.ajax({
                                        url: `/senha/${corrida}/${categoria}`,
                                        method: 'GET',
                                        dataType: 'json'
                                    });

                                    return response;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection

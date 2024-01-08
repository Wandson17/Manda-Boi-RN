@extends('layouts.base')

@section('title', 'Cadastrar Evento')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .custom-file-btn {
            cursor: pointer !important;
        }

        .custom-file-input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>
@endsection

@section('body-class', 'background')

@section('content')

    @include('layouts.navbar')

    @error('cover_image')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    <main class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-10 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                        <div class="d-flex justify-content-center ">

                        </div>

                        <form action="{{ route('festa.store') }}" validate method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="corrida_id" value="{{ $corridaId }}">
                            <div class="card mb-3 bg-dark navbar-light text-light" style="height: 515px;">

                                <div class="card-body">
                                    <h3 class="d-flex justify-content-center align-content-center m-2">Cadastro de Festas</h3>
                                    <hr class="w-100" />

                                    <div class="row d-flex justify-content-center">


                                        <div class="col-md-4 ">
                                            <div class="row ">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <p> <b>Folder do Evento</b></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <img src="https://th.bing.com/th/id/OIP.xI8Q-r8Tmm_pRNioY6PLYQHaHa?rs=1&pid=ImgDetMain" id="folder_image" class="w-100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <div class="file-input-wrapper">
                                                        <button class="btn btn-secondary custom-file-btn"
                                                            onclick="">Upload
                                                            <i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                                                        <input type="file" id="cover_image" name="cover_image"
                                                            class="custom-file-input" />
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                        </div>

                                        <div class="col-md-8">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <label for="name" class="col-12">
                                                                    Nome da festa *
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="nome" id="nome"
                                                                        value="{{ old('nome') }}"
                                                                        class="form-control @error('nome') is-invalid @enderror"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('nome')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <label for="atracoes" class="col-12">
                                                                    Atrações *
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="atracoes" id="atracoes"
                                                                        value="{{ old('atracoes') }}"
                                                                        class="form-control @error('atracoes') is-invalid @enderror"
                                                                        aria-describedby="basic-addon1"
                                                                        placeholder="EX: Edyr Vaqueiro, Taty girl">
                                                                    @error('atracoes')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <label for="localizacao" class="col-6">
                                                                    Localização *
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-2">
                                                                    <input type="text" name="localizacao" id="localizacao"
                                                                        value="{{ old('localizacao') }}"
                                                                        class="form-control @error('localizacao') is-invalid @enderror"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('localizacao')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-11">

                                                        <div class="d-flex justify-content-around">
                                                            <div class="row">
                                                                <label for="data_inicio" class="col-12">
                                                                    Data da Festa*
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <label for="time" class="col-12">
                                                                    Horário *
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="row">
                                                                <div class="input-group mb-4">
                                                                    <input type="date"
                                                                        class="form-control me-5 rounded @error('data_inicio') is-invalid @enderror"
                                                                        placeholder="Data de inicio" aria-label="data"
                                                                        id="data_inicio" name="data_inicio"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('data_inicio')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                    <input type="time"
                                                                        class="form-control rounded @error('time') is-invalid @enderror"
                                                                        placeholder="Horário" aria-label="time"
                                                                        id="time" name="time"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('time')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row d-flex justify-content-center align-content-center">
                                                <div class="col-12 d-flex justify-content-center m-2">
                                                    <button class="btn" style="background-color: #FFB17B;">Prosseguir</button>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                    </form>
                </div>

            </div>
            </div>

        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('cover_image');
            const customFileBtn = document.querySelector('.custom-file-btn');
            const previewImage = document.getElementById('folder_image');

            customFileBtn.addEventListener('click', function(e) {
                e.preventDefault(); // Impede o comportamento padrão do botão

                fileInput.click();
            });

            customFileBtn.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                const selectedFile = fileInput.files[0];

                if (selectedFile) {
                    // Use FileReader para ler o conteúdo da imagem como URL de dados
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Define a src do elemento img com a URL de dados da imagem
                        previewImage.src = e.target.result;
                    };

                    reader.readAsDataURL(selectedFile);
                } else {
                    // Se o usuário desmarcar a seleção, limpe a imagem
                    previewImage.src = '';
                }
            });
        });
    </script>

@endsection

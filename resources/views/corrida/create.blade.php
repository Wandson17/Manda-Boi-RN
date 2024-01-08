@extends('layouts.base')

@section('title', 'Cadastrar Vaquejada')

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

                        <form action="{{ route('corrida.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-3 bg-dark navbar-light text-light" style="height: 600px;">

                                <div class="card-body">
                                    <h3 class="d-flex justify-content-center align-content-center m-2">Cadastro de Vaquejada</h3>
                                    <hr class="w-100" />
                                    <div class="row d-flex justify-content-center">

                                        <div class="col-md-4 ">
                                            <div class="row ">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <p> <b>Folder da Vaquejada</b></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <img src="https://th.bing.com/th/id/OIP.xI8Q-r8Tmm_pRNioY6PLYQHaHa?rs=1&pid=ImgDetMain" id="folder_image"
                                                        class="w-100">
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
                                                                    Nome da vaquejada *
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="name" id="name"
                                                                        value="{{ old('name') }}"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('name')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <label for="park_name" class="col-12">
                                                                    Nome Do Parque *
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="park_name" id="park_name"
                                                                        value="{{ old('park_name') }}"
                                                                        class="form-control @error('park_name') is-invalid @enderror"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('park_name')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <label for="qntd_senha" class="col-12">
                                                                    Quantidade de senhas
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="qntd_senha" id="qntd_senha"
                                                                        value="{{ old('qntd_senha') }}"
                                                                        class="form-control @error('qntd_senha') is-invalid @enderror"
                                                                        aria-describedby="basic-addon1">
                                                                    @error('qntd_senha')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <label for="city" class="col-6">
                                                                    Cidade *
                                                                </label>
                                                            </div>

                                                            <div class="row">
                                                                <div class="input-group mb-2">
                                                                    @php
                                                                        $cities = \App\Models\City::all();
                                                                    @endphp
                                                                    <select name="city" id="city" id="city"
                                                                        class="form-select @error('city') is-invalid @enderror"
                                                                        selected="{{ old('city') }}">
                                                                        required>
                                                                        @foreach ($cities as $city)
                                                                            <option value="{{ $city->id }}">
                                                                                {{ $city->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('city')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-11">

                                                            <div class="d-flex justify-content-around">
                                                                <div class="row">
                                                                    <label for="start_date" class="col-12">
                                                                        Data de Início *
                                                                    </label>
                                                                </div>

                                                                <div class="row">
                                                                    <label for="end_date" class="col-12">
                                                                        Data de Término *
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="row">
                                                                    <div class="input-group mb-4">
                                                                        <input type="date"
                                                                            class="form-control me-5 rounded @error('start_date') is-invalid @enderror"
                                                                            placeholder="Data de inicio" aria-label="data"
                                                                            id="start_date" name="start_date"
                                                                            aria-describedby="basic-addon1">
                                                                        @error('start_date')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                        <input type="date"
                                                                            class="form-control rounded @error('end_date') is-invalid @enderror"
                                                                            placeholder="Data de final" aria-label="data"
                                                                            id="end_date" name="end_date"
                                                                            aria-describedby="basic-addon1">
                                                                        @error('end_date')
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
                                                    <div class="col-md-4">
                                                        <button class="btn w-100" style="background-color: #FFB17B;">Proseguir</button>
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


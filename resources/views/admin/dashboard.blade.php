@extends('layouts.base')

@section('title', 'Dashboard - Administrador')

@section('content')

    @include('layouts.navbar')

    <main class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container ">
                <h1 class=" text-center" style="color: black;">Área Do Administrador </h1>
                <div class="row justify-content-center ">
                    <div class="col-lg-10 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                        <div class="d-flex justify-content-center ">

                        </div>

                        <div class="admin card-body ">

                            <div class="pt-4 pb-2">

                            </div>

                            <section class="row g-3">

                                <div class="col-12 d-flex justify-content-center ">
                                    <div class="col-12 d-flex justify-content-center ">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button class="rounded-pill shadow"  style="width: 100%; height: 15vh; border: none; background-color: #FFB17B; font-size: larger; color:black;"
                                            onclick="window.location.href='{{ route('corrida.create') }}'"> <b>Cadastrar Vaquejada</b></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid gap-2 col-6 mx-auto ">
                                        <button class="rounded-pill shadow" style="width: 100%; height: 15vh; border: 3px #FFB17B solid; background-color: white; font-size: larger; color:black"
                                        onclick="window.location.href='{{ route('corrida.index') }}'"><b>Ver Vaquejadas</b></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid gap-2 col-6 mx-auto ">
                                        <button class="rounded-pill shadow" style="width: 100%; height: 15vh; border: 3px #FFB17B solid; background-color: white; font-size: larger; color:black;"
                                        onclick="window.location.href='{{ route('festa.index') }}'"><b>Ver Eventos</b></button>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center ">
                                    <div class="col-12 d-flex justify-content-center ">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button class="rounded-pill shadow"  class="rounded-pill shadow" style="width: 100%; height: 15vh; border: 3px #FFB17B solid; background-color: white; font-size: larger; color:black;"
                                            onclick="window.location.href='{{ route('senha.usuario.index') }}'"> <b>Ver Situação de Senha</b></button>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>

                    </div>
                </div>
            </div>

        </section>

    </main>

@endsection

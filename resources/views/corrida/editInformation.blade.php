@extends('layouts.base')

@section('title', 'Editar informações')

@section('head')
    @trixassets
    <style>
        body{
            background-image: url({{asset('imgs/fundo.jpg')}});
        }
    </style>
@endsection

@section('content')

    @include('layouts.navbar')

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container ">
                    <div class="row justify-content-center ">
                        <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                            <div class="d-flex justify-content-center ">

                            </div>

                            <div class="w-100 p-5 pb-3 pt-3 mb-3 bg-light navbar-light bg-opacity-75 ">

                                <div class="card-body">
                                    <div
                                        class=" bg-secondary text-light mb-4 w-100  d-flex justify-content-center align-content-center">

                                        <h4 class="d-flex justify-content-center align-content-center ">Informações da
                                            Vaquejada</h4>
                                    </div>

                                </div>

                                <form class="row g-3 needs-validation" action="{{route('corrida.storeInformation', ['id' => $corrida->id])}}" method="post" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        @trix(\App\Models\Corrida::class, 'content')

                                    </div>

                                    <div class="col-12 d-flex justify-content-center">
                                        <button class="btn btn-secondary w-50 ">Cadastrar <i
                                                class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </div>
    </main>

@endsection

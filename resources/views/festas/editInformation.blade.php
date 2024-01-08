@extends('layouts.base')

@section('title', 'Editar informações da festa')

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
            <section class="section register mt-5 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container ">
                    <div class="row justify-content-center ">
                        <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center ">
                            <div class="card mb-3 bg-light navbar-light bg-opacity-75 " style="width: 100vh; height: 37vh;">
                                <div class="card-body">
                                    <h4 class="d-flex justify-content-center align-content-center ">Informações da Festa</h4>
                                    <hr class="w-100" />
                        
                                    <form class="row g-3 needs-validation" action="{{route('festa.storeInformation', ['id' => $festa->id])}}" method="post" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            @trix(\App\Models\Festa::class, 'content')
    
                                        </div>
    
                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn w-50 " style="background-color: #FFB17B;">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


@endsection

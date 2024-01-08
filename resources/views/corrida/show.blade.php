@extends('layouts.base')

@section('title', $corrida->nome)

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @trixassets
@endsection

@section('content')

    @include('layouts.navbar')

    <main>

        <div class="container">
            <section class="my-3 conteudo p-5 rounded-2">
                <div class="row">
                    <div class="col">
                      <img src="{{ asset('storage/' . $corrida->photo) }}" alt="poster" class="poster">
                    </div>
                    <div class="col colorgray p-5 rounded">

                        <h2 class="bg-secondary mb-5 text-center">Informações Importantes</h2>

                        @trix($corrida, 'content', [ 'hideToolbar' => true ])

                        <div class="botao text-center mt-2">
                            <button type="button" class="btn btn-light" onclick="window.location.href='{{ route('senha.usuario.create', $corrida->id) }}'">Comprar Senha</button>
                        </div>
                    </div>
                  </div>                
            </section>
        </div>
    </main>

    <script>
        var trixEditor = document.querySelector('trix-editor');

        trixEditor.setAttribute('contenteditable', false);
    </script>

@endsection

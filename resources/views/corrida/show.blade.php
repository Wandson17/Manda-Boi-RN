@extends('layouts.base')

@section('title', $corrida->nome)

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @trixassets
@endsection

@section('content')

    @include('layouts.navbar')

    <main>
        <div class="infoimportantes">
            <div class="conteudo bg-dark">
                <img src="{{ asset('storage/' . $corrida->photo) }}" alt="poster" class="poster">
                <div class="divcont bg-dark">
                    <div class="w-100">

                        <h2 class="fontoverlock mb-5">INFORMAÇÕES IMPORTANTES</h2>

                        @trix($corrida, 'content', [ 'hideToolbar' => true ])

                        <div class="botao text-center mt-2">
                            <button type="button" class="btn btn-light">Comprar Senha</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        var trixEditor = document.querySelector('trix-editor');

        trixEditor.setAttribute('contenteditable', false);
    </script>
@endsection

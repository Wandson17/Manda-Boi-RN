<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSenhaRequest;
use App\Models\Corrida;
use Illuminate\Http\Request;
use App\Models\TipoSenha;

class SenhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senhas = \App\Models\SenhaCorrida::with(['corrida', 'categoria'])->get();
        return view('senha_usuario.index', compact('senhas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Corrida $corrida)
    {
        return view('corrida.create_senha', compact('corrida'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSenhaRequest $request)
    {
        $request->validated();

        $tipoSenha = TipoSenha::create([
            'corrida_id' => $request->corrida_id,
            'categoria_senhas_id' => $request->categoria,
            'de' => $request->de,
            'ate' => $request->ate,
            'valor' => $request->valor,
        ]);

        return redirect()
            ->route('corrida.index')
            ->with('success', 'Senha criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

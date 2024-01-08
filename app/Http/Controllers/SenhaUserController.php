<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSenhaUserRequest;
use App\Models\Corrida;
use Illuminate\Http\Request;
use App\Models\SenhaCorrida;
use App\Models\TipoSenha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SenhaUserController extends Controller
{

    public function create(Corrida $corrida)
    {
        return view('senha_usuario.create', compact('corrida'));
    }

    public function store(StoreSenhaUserRequest $request)
    {
        $request->validated();

        $tipoSenha = TipoSenha::find($request->categoria);
        $valor = $tipoSenha->valor;

        $senhaCorrida = SenhaCorrida::create([
            'numero' => $request->n_senha,
            'nome_puxador' => $request->nome_vaqueiro,
            'apelido_puxado' => $request->apelido,
            'cpf_puxador' => $request->cpf,
            'cavalo_puxador' => $request->cavalo_puxador,
            'nome_esteira' => $request->esteireiro,
            'apelido_esteira' => $request->apelido_esteira,
            'cidade' => $request->cidade,
            'UF' => 'RN',
            'representacao_id' => $request->representacao,
            'status_pagamento' => 0,
            'corrida_id' => $request->corrida_id,
            'user_id' => Auth::user()->id,
            'categoria_senhas_id' => $request->categoria,
            'valor_total' => $valor,
            'forma_pagamento_id' => $request->forma_pagamento,
        ]);

        return redirect()
            ->route('senha.usuario.confirmation', $senhaCorrida->id)
            ->with('success', 'Senha comprada com sucesso!');
    }

    public function show(SenhaCorrida $senha)
    {
        return view('senha.usuario.confirmation', compact('senha'));
    }

    public function confirmation($senha)
    {
        $senha = SenhaCorrida::with('formaPagamento')->where('id', $senha)->first();
        if(!$senha)
            abort(404);

        if(!Gate::authorize('user-can-see-senha', $senha))
            abort(403);

        return view('senha_usuario.confirmation', compact('senha'));
    }


    public function getSenhasByCategoria($corrida, $categoria)
    {
        $senhas = \App\Models\TipoSenha::where('corrida_id', $corrida)
            ->where('categoria_senhas_id', $categoria)
            ->select('de', 'ate')
            ->first();

        $senhasCompradas = \App\Models\SenhaCorrida::where('corrida_id', $corrida)
            ->where('categoria_senhas_id', $categoria)
            ->pluck('numero')
            ->toArray();

        $saida = [
            'senhas' => $senhas,
            'senhasCompradas' => $senhasCompradas
        ];

        return response()->json($saida);
    }

    public function destroy($senha)
    {
        SenhaCorrida::find($senha)->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Senha removida com sucesso!');
    }

}

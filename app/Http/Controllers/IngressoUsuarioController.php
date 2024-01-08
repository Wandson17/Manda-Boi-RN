<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngressoUsuarioRequest;
use App\Models\Festa;
use App\Models\FormaPagamento;
use App\Models\Ingresso;
use App\Models\IngressoFesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IngressoUsuarioController extends Controller
{

    public function create(Festa $festa)
    {
        $ingressos = Ingresso::with('categoriaIngresso')->where('festa_id', $festa->id)->get();
        $formasPagamentos = FormaPagamento::all();

        return view('ingresso_festa.create', [
            'festa' => $festa,
            'ingressos' => $ingressos,
            'formas_pagamento' => $formasPagamentos
        ]);
    }

    public function store(StoreIngressoUsuarioRequest $request)
    {
        $request->validated();

        $valor = Ingresso::find($request->ingresso)->preco;

        $ingresso = IngressoFesta::create([
            'festa_id' => $request->festa_id,
            'ingresso_id' => $request->ingresso,
            'forma_pagamento_id' => $request->forma_pagamento,
            'user_id' => Auth::user()->id,
            'valor_total' => $valor,
        ]);

        return redirect()
            ->route('ingresso.usuario.confirmation', $ingresso->id);
    }

    public function confirmation($id)
    {
        $ingresso = IngressoFesta::with('formaPagamento')->where('id', $id)->first();
        if(!$ingresso)
            abort(404);

        if(!Gate::authorize('user-can-see-ingresso', $ingresso))
            abort(403);
        
        return view('ingresso_festa.confirmation', compact('ingresso'));
    }

}

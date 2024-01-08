<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngressoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Festa, CategoriaIngresso, Ingresso};

class IngressoController extends Controller
{
    public function create(string $id)
    {
        $festa = Festa::findOrFail($id);
        $categorias = CategoriaIngresso::all();
        return view('festas.create_ingressos', compact('festa', 'categorias'));
    }

    public function store(StoreIngressoRequest $request)
    {
        $request->validated();

        $this->saveIngresso('VIP', $request->festa_id, $request->value_VIP, $request->observation_VIP);
        $this->saveIngresso('Estudante', $request->festa_id, $request->value_Estudante, $request->observation_Estudante);
        $this->saveIngresso('Pista', $request->festa_id, $request->value_Pista, $request->observation_Pista);
        $this->saveIngresso('Meia', $request->festa_id, $request->value_Meia, $request->observation_Meia);

        session()->flash('success', 'Ingressos criados com sucesso!');
        return redirect()->route('festa.index');
    }

    public static function ingressosExists(string $id)
    {
        $ingressos = Ingresso::where('festa_id', $id)->get();
        return count($ingressos) == 4
            ? true : false;
    }

    protected function saveIngresso(string $categoria, int $festa_id, float $preco, string $observation)
    {

        $categoriaIngresso = CategoriaIngresso::where('categoria', $categoria)->first();

        if($this::ingressosExists($festa_id))
            DB::table('ingressos')->where('festa_id', $festa_id)->delete();

        Ingresso::create([
            'festa_id' => $festa_id,
            'categoria_ingresso_id' => $categoriaIngresso->id,
            'preco' => $preco,
            'observation' => $observation
        ]);
    }

}

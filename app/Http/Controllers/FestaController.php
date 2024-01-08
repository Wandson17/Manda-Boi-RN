<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFestaRequest;
use App\Http\Requests\UpdateFestaRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\{Festa, Corrida};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FestaController extends Controller
{
    public function index()
    {
        $festas = Festa::with('corrida')->get();
        return view('festas.index', compact('festas'));
    }

    public function create(string $corridaId)
    {
        $corrida = Corrida::find($corridaId);
        if (!$corrida)
            return redirect()->route('corrida.index')->with('error', 'Corrida não encontrada para adicionar um evento!');
        return view('festas.create', compact('corridaId'));
    }

    public function store(StoreFestaRequest $request)
    {
        $request->validated();

        // salva imagem
        $photo = $request->file('cover_image');
        $photoPath = $photo->storeAs('public/photos', $photo->hashName());
        Storage::setVisibility($photoPath, "public");

        // $photoPath = $photo->store('photos', 'public');

        // dd($photoPath);
        $festa = Festa::create([
            'nome' => $request->nome,
            'endereco' => $request->localizacao,
            'atracoes' => $request->atracoes,
            'data_inicio' => $request->data_inicio,
            'time' => $request->time,
            'corrida_id' => $request->corrida_id,
            'photo' => $photoPath,
        ]);

        return redirect()->route('festa.index')
            ->with('success', 'Evento criado com sucesso!');
    }

    public function show(string $id)
    {
        $festa = Festa::findOrFail($id);
        if (!$festa->active)
            abort(404);
        return view('festas.show', compact('festa'));
    }

    public function editInformation(string $id)
    {
        $festa = Festa::findOrFail($id);
        return view('festas.editInformation', compact('festa'));
    }

    public function storeInformation(Request $request, string $id)
    {
        $data = $request->get('festa-trixFields');
        $festa = Festa::findOrFail($id);
        $festa->update([
            'festa-trixFields' => $request->get('festa-trixFields'),
        ]);
        $festa->save();
        return redirect()->route('festa.index')
            ->with('success', 'Informações da festa adicionado com sucesso!');
    }

    public function edit(string $id)
    {
        $festa = Festa::findOrFail($id);
        return view('festas.edit', compact('festa'));
    }

    public function update(UpdateFestaRequest $request)
    {
        $request->validated();

        $festa = Festa::find($request->festa_id);

        $festa->update([
            'nome' => $request->nome,
            'endereco' => $request->localizacao,
            'atracoes' => $request->atracoes,
            'data_inicio' => $request->data_inicio,
            'time' => $request->time,
        ]);

        $hasImageFile = $request->hasFile('cover_image');

        if ($hasImageFile) {
            $imageValidation = Validator::make($request->all(), [
                'cover_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            ], [
                'cover_image.max' => 'Tamanho da imagem ultrapassou o limite de 4 MB',
                'cover_image.mimes' => 'Formato de imagem inválida',
                'cover_image.image' => 'Imagem inválida',
            ]);

            if ($imageValidation->fails()) {
                return redirect()->back()->withErrors($imageValidation)->withInput();
            }

            $photo = $request->file('cover_image');
            $photoPath = $photo->store('photos', 'public');
            Storage::delete($festa->photo);

            $festa->photo = $photoPath;
            $festa->save();
        }

        return redirect()->route('festa.index')
            ->with('success', 'Festa atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $festa = Festa::findOrFail($id);
        $festa->delete();
        return redirect()->route('festa.index')
            ->with('success', 'Festa removida com sucesso!');
    }
}

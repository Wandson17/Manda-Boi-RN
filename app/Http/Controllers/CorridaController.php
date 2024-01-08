<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorridaRequest;
use App\Http\Requests\UpdateCorridaRequest;
use App\Models\Corrida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CorridaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $corridas = Corrida::with('festa')->get();
        return view('corrida.index', compact('corridas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('corrida.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorridaRequest $request)
    {
        $request->validated();

        $corrida = Corrida::create([
            'nome' => $request->name,
            'park_name' => $request->park_name,
            'data_inicio' => $request->start_date,
            'data_fim' => $request->end_date,
            'city' => $request->city,
            'qntd_senha' => $request->qntd_senha
        ]);

        // salva imagem
        $photo = $request->file('cover_image');
        $photoPath = $photo->store('photos', 'public');

        $corrida->photo = $photoPath;
        $corrida->save();

        return redirect()->route('corrida.index')
            ->with('message', 'Corrida criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $corrida = Corrida::findOrFail($id);
        return view('corrida.show', compact('corrida'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $corrida = Corrida::findOrFail($id);
        return view('corrida.edit', compact('corrida'));
    }

    public function update(UpdateCorridaRequest $request, string $id)
    {
        $request->validated();

        $corrida = Corrida::findOrFail($id);

        $corrida->update([
            'nome' => $request->name,
            'park_name' => $request->park_name,
            'data_inicio' => $request->start_date,
            'data_fim' => $request->end_date,
            'city' => $request->city,
            'qntd_senha' => $request->qntd_senha
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
            Storage::delete($corrida->photo);

            $corrida->photo = $photoPath;
            $corrida->save();
        }

        return redirect()->route('corrida.index')
            ->with('message', 'Corrida editada com sucesso!');
    }

    public function editInformation(string $id)
    {
        $corrida = Corrida::findOrFail($id);
        return view('corrida.editInformation', compact('corrida'));
    }

    public function storeInformation(Request $request, string $id)
    {
        $data = $request->get('corrida-trixFields');
        $corrida = Corrida::findOrFail($id);
        $corrida->update([
            'corrida-trixFields' => $request->get('corrida-trixFields'),
        ]);
        $corrida->save();
        return redirect()->route('corrida.index')
            ->with('message', 'Corrida editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $corrida = Corrida::findOrFail($id);

        Storage::delete($corrida->photo);

        $corrida->delete();

        return redirect('/corrida')
            ->with('message', 'Corrida removida com sucesso!');
    }
}

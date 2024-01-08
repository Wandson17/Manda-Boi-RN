<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\IngressoFesta;
use App\Models\SenhaCorrida;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.dashboard');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function mySenhas()
    {
        $senhas = SenhaCorrida::where('user_id', auth()->user()->id)->get();
        return view('profile.senhas', compact('senhas'));
    }

    public function myIngressos()
    {
        $ingressos = IngressoFesta::where('user_id', auth()->user()->id)->get();
        return view('profile.ingressos', compact('ingressos'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->validated();

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->celular = $request->celular;
        $user->save();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Informações atualizadas com sucesso!');
    }
}

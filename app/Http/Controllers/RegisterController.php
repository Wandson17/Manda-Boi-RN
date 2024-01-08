<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreRegisterRequest $request): RedirectResponse
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => bcrypt($request->password),
            'celular' => $request->celular,
            'data_nascimento' => $request->data_nascimento
        ]);

        $credentials = $request->only('cpf', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        }

        return redirect()->intended('dashboard');
    }

}

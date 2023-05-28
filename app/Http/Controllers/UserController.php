<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user/login');
    }

    public function create()
    {
        return view('user/register');
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            $message = 'Usuário cadastrado com sucesso!';
        } else {
            $message = 'Usuário não cadastrado!';
        }

        return redirect('login')->with([
            'message' => $message,
        ]);
    }

    public function show(User $user)
    {
        return view('config/config', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->adress = $request->adress;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->social_media_1 = $request->social_media_1;
        $user->social_media_2 = $request->social_media_2;

        if ($user->save()) {
            session(['name' => $request->name]);
            $message = 'Usuário atualizado com sucesso!';
            $messageSucessDanger = 'success';
        } else {
            $message = 'Usuário não atualizado!';
            $messageSucessDanger = 'danger';
        }

        return redirect()->back()->with([
            'message' => $message,
            'messageSucessDanger' => $messageSucessDanger,
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
                'email.required' => 'E-mail é obrigatório',
                'password.required' => 'Senha é obrigatória',
            ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = DB::table('users')->where('id', Auth::id())->get();

            session(['id' => Auth::id()]);
            session(['name' => $user[0]->name]);

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'E-mail ou senha inválida',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

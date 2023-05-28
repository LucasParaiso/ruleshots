<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ApiUsersController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        try {
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return $user;

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao cadastrar o usuario.'
            ], 404);
        }
    }

    public function show($user)
    {
        $user = User::find($user);

        if ($user) {
            return $user;
        }

        return response()->json([
            'message' => 'Usuario nao encontrado.',
        ], 404);
    }

    public function update(Request $request, $user)
    {
        try {
            $user = User::find($user);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return $user;

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Nao foi possivel atualizar o usuario.',
            ], 404);
        }
    }

    public function destroy($user)
    {
        try {
            $user = User::find($user);
            $user->delete();

            return response()->json([
                'message' => 'Usuario deletado com sucesso.',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Nao foi possivel deletar o usuario.',
            ], 404);
        }
    }
}

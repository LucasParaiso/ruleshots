<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Drink;
use App\Models\User;

class ApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        try {
            $user->save();
        } catch (\PDOException $pdoe) {
            return json_encode('Usuario ja existente');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function show($id)
    {
        try {
            return User::findOrFail($id);
        } catch (ModelNotFoundException $mnfe) {
            return json_encode('Usuario nao encontrado');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        try {
            $user->save();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}

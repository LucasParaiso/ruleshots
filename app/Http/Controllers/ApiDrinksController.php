<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class ApiDrinksController extends Controller
{
    public function index()
    {
        return Drink::all();
    }

    public function store(Request $request)
    {
        try {
            $drink = new Drink;
            $drink->user_id = $request->user_id;
            $drink->name = $request->name;
            $drink->empty_bottle_weight = $request->empty_bottle_weight;
            $drink->shot_weight = $request->shot_weight;
            $drink->shot_remaining = $request->shot_remaining;
            $drink->save();

            return $drink;

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao cadastrar a bebida.'
            ], 404);
        }
    }

    public function show($drink)
    {
        $drink = Drink::find($drink);

        if ($drink) {
            return $drink;
        }

        return response()->json([
            'message' => 'Bebida nao encontrada.',
        ], 404);
    }

    public function update(Request $request, $drink)
    {
        try {
            $drink = Drink::find($drink);
            $drink->user_id = $request->user_id;
            $drink->name = $request->name;
            $drink->empty_bottle_weight = $request->empty_bottle_weight;
            $drink->shot_weight = $request->shot_weight;
            $drink->shot_remaining = $request->shot_remaining;
            $drink->save();

            return $drink;

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Nao foi possivel atualizar a bebida.',
            ], 404);
        }
    }

    public function destroy($drink)
    {
        try {
            $drink = Drink::find($drink);
            $drink->delete();

            return response()->json([
                'message' => 'Bebida deletada com sucesso.',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Nao foi possivel deletar a Bebida.',
            ], 404);
        }
    }
}

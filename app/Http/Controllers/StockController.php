<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = DB::table('drinks')->where('user_id', Auth::user()->id)->get();

        return view('stock/stock', [
            'drinks' => $drinks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $shot_weight = $request->shot_weight - $request->empty_shot_weight;
        $shot_remaining  = ($request->total_bottle_weight - ($request->empty_bottle_weight * $request->bottle_quantity)) / $shot_weight;

        $insert = DB::table('drinks')->insert([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'empty_bottle_weight' => $request->empty_bottle_weight,
            'shot_weight' => $shot_weight,
            'shot_remaining' => $shot_remaining,
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        if ($insert) {
            $message = $request->name . ' cadastrado com sucesso!';
            $messageSucessDanger = 'success';
        } else {
            $message = $request->name . ' não cadastrado!';
            $messageSucessDanger = 'danger';
        }

        return redirect()->back()->with([
            'message' => $message,
            'messageSucessDanger' => $messageSucessDanger,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $drink = DB::table('drinks')->where('id', $id)->get();

        $shot_remaining  = ($request->total_bottle_weight - ($drink[0]->empty_bottle_weight * $request->bottle_quantity)) / $drink[0]->shot_weight;

        $update = DB::table('drinks')->where('id', $id)->update([
            'shot_remaining' => $shot_remaining,
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        if ($update) {
            $message = 'Garrafa ' . $drink[0]->name . ' atualizada com sucesso!';
            $messageSucessDanger = 'success';
        } else {
            $message = 'Garrafa ' . $drink[0]->name . ' não atualizada!';
            $messageSucessDanger = 'danger';
        }

        return redirect()->back()->with([
            'message' => $message,
            'messageSucessDanger' => $messageSucessDanger,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('drinks')->where('id', $id)->delete();

        if ($delete) {
            $message = 'Garrafa excluida com sucesso!';
            $messageSucessDanger = 'success';
        } else {
            $message = 'Garrafa não excluid!';
            $messageSucessDanger = 'danger';
        }

        return redirect()->back()->with([
            'message' => $message,
            'messageSucessDanger' => $messageSucessDanger,
        ]);
    }

    public function updateShotRemaining(Request $request, $id)
    {
        $drink = DB::table('drinks')->where('id', $id)->get();
        $shot_remaining = $drink[0]->shot_remaining;

        if ($request->operacao == 'retirar') {
            $shot_remaining -= $request->value;
        }

        if ($request->operacao == 'adicionar') {
            $shot_remaining += $request->value;
        }

        $update = DB::table('drinks')->where('id', $id)->update([
            'shot_remaining' => $shot_remaining,
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        if ($update) {
            $message = 'Shots Atualizados com Sucesso!';
            $messageSucessDanger = 'success';
        } else {
            $message = 'Shots não Atualizados!';
            $messageSucessDanger = 'danger';
        }

        return redirect()->back()->with([
            'message' => $message,
            'messageSucessDanger' => $messageSucessDanger,
        ]);
    }
}

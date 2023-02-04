<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Redirect extends Controller
{
    public function index()
    {
        $ative = DB::table('links')->where('is_active', 1)->get();

        header('Location: ' . $ative[0]->link);
        die();
    }

    public function edit()
    {
        $links = DB::table('links')->get();

        return view('links/links')->with([
            'links' => $links,
        ]);
    }

    public function form()
    {
        return view('links/form');
    }

    public function store(Request $request)
    {
        $link = DB::table('links')->insert([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => ($request->icon == '') ? 'fa-solid fa-icons' : $request->icon,
        ]);

        if ($link) {
            return redirect('/links');
        } else {
            return redirect('/links/form')->with([
                'message' => 'Não foi possível criar o link',
            ]);
        }
    }

    public function update(Request $request)
    {
        $ative = DB::table('links')->where('is_active', 1)->get();
        DB::table('links')->where('id', $ative[0]->id)->update(['is_active' => 0]);
        DB::table('links')->where('id', $request->id)->update(['is_active' => 1]);

        return redirect('/links');
    }
}

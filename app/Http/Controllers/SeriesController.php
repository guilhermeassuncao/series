<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(){
        $series = [
            'Greys Anatomy',
            'Lost',
            'Agents of SHIELD'
        ];

        return view('series.index', compact('series'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        $nome = $request->nome;
        echo "Série $nome criada com sucesso";
    }
}

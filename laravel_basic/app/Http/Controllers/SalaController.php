<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalaController extends Controller
{

    public function index(){
        $salas = Salas::all();

        return view('welcome', [
            'salas' => $salas
        ]);
    }

    public function create(){
        return view('salas.create');
    }


    public function store(Request $request){
    $sala = new Salas;

    $sala->name = $request->name;
    $sala->qty = $request->qty;
    $sala->description = $request->description;
    $sala->itens = $request->itens;


    // upload da imagem
    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->file('image');

        $extension = $requestImage->extension();

        $imageName = md5(
            $requestImage->getClientOriginalName() .
            strtotime("now")
        ) . "." . $extension;

        $requestImage->move(public_path('img/salas'), $imageName);

        $sala->image = $imageName;
    }

    $sala->save();

    return redirect('/')->with('msg', 'Sala criada com sucesso!');
}


public function show(int $id){
    
    $sala = Salas::findOrFail($id);

    return view('salas.show', [
        'sala' => $sala
    ]);
}
}
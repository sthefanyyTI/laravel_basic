<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalaController extends Controller
{

public function index()
{
    $search = request('search');

    if ($search) {
        // Remover espaços extras no início e no fim da busca
        $search = trim($search);

        // Buscar pelo campo 'name' em vez de 'title'
        $salas = Salas::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])->get();
    } else {
        $salas = Salas::all();
    }

    return view('welcome', [
        'salas' => $salas,
        'search' => $search
    ]);
}




    public function create(){
        return view('salas.create');
    }


    public function store(Request $request){
    $sala = new Salas;

    $sala->name = $request->name;
    $sala->date = $request->date;
    $sala->qty = $request->qty;
    $sala->description = $request->description ?: '';
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

    $sala->items = explode(',', $sala->items); // Transforma a string em um array

    return view('salas.show', ['sala' => $sala]);

}
}
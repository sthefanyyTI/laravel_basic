<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalaController extends Controller {

public function index() {
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

    public function create() {
        return view('salas.create');
    }


    public function store(Request $request){
    $sala = new Salas;

    $sala->name = $request->name;
    $sala->date = $request->date;
    $sala->qty = $request->qty;
    $sala->description = $request->description ?: '';

    if ($request->has('itens')) {

        $sala->itens = implode(',', $request->itens);
        
    }


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

    $user = auth()->user();
    $sala->user_id = $user->id;

    $sala->save();

    return redirect('/')->with('msg', 'Sala criada com sucesso!');
}


    public function show(int $id) {
    
        $sala = Salas::findOrFail($id);

        $sala->itens = explode(',', $sala->itens); // Transforma a string em um array

        return view('salas.show', ['sala' => $sala]);
    }

    public function dashboard() {

        $user = auth()->user();

        $salas = $user->salas;

        $salasAsParticipantes = $user->salasAsParticipantes;

        return view('salas.dashboard', 
            ['salas' => $salas, 'salasAsParticipantes' => $salasAsParticipantes]);
    }   

    public function destroy($id) {

        Salas::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Sala excluída com sucesso!');
    }

    public function edit($id) {

        $user = auth()->user();

        $sala = Salas::findOrFail($id);

        if($user->id != $sala->user_id) {
            return redirect('/dashboard');
        }

        $sala->itens = explode(',', $sala->itens);

        return view('salas.edit', ['sala' => $sala]);
    }

public function update(Request $request, $id) {
    $sala = Salas::findOrFail($id);

    $data = $request->all();

    if ($request->has('itens')) {
        $data['itens'] = implode(',', $request->itens);
    }

    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->file('image');
        $extension = $requestImage->extension();

        $imageName = md5(
            $requestImage->getClientOriginalName() . strtotime("now")
        ) . "." . $extension;

        $requestImage->move(public_path('img/salas'), $imageName);

        $data['image'] = $imageName;
    }

    $sala->update($data);

    return redirect('/dashboard')->with('msg', 'Sala editada com sucesso!');
}

    public function joinSala($id) {

        $user = auth()->user(); 

        $user->salasAsParticipantes()->attach($id);

        $sala = Salas::findOrFail($id);
        
        return redirect('/dashboard')->with('msg', 'Você entrou na sala ' . $sala->name);
    }

}
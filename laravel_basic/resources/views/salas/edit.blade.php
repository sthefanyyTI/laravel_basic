@extends('layouts.main')
@section('title', 'Editando')
@section('content')

<div id="sala-create-container" class="col-md-6 offset-md-3">
    <h1>Editando:</h1>

<form method="POST"
      action="{{ route('salas.update', $sala->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="img">Imagem da sala:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/salas/{{ $sala->image }}" alt="{{ $sala->name }}" class="img-preview">
        </div>

        <div class="form-group">
            <label for="name">Sala:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome da Sala" value="{{ $sala->name}}">
        </div>

        <div class="form-group">
            <label for="date">Data:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $sala->date }}">
        </div>

        <div class="form-group">
            <label for="qty">Quantidade:</label>
            <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantidade" value="{{ $sala->qty}}">
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição da sala">{{$sala->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="title">Itens da sala:</label>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Cadeiras" value="Cadeiras" {{ in_array('Cadeiras', $sala->itens) ? 'checked' : '' }}>Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Canetas" value="Canetas" {{ in_array('Canetas', $sala->itens) ? 'checked' : '' }}>Canetas
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Atividade" value="Atividade" {{ in_array('Atividade', $sala->itens) ? 'checked' : '' }}>Atividade
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Som" value="Som" {{ in_array('Som', $sala->itens) ? 'checked' : '' }}>Som
            </div>
        </div>


        <input type="submit" value="Editar sala" class="btn btn-primary">
    </form>
</div>

@endsection
@extends('layouts.main')
@section('title', 'Criar Salas')
@section('content')

<div id="sala-create-container" class="col-md-6 offset-md-3">
    <h1>Crie a sua sala</h1>

    <form action="/salas" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img">Imagem da sala:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="name">Sala:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome da Sala">
        </div>

        <div class="form-group">
            <label for="date">Data:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>

        <div class="form-group">
            <label for="qty">Quantidade:</label>
            <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantidade">
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição da sala"></textarea>
        </div>

        <div class="form-group">
            <label for="title">Itens da sala:</label>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Canetas">Canetas
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Atividade">Atividade
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" id="Som">Som
            </div>
        </div>


        <input type="submit" value="Criar sala" class="btn btn-primary">
    </form>
</div>

@endsection

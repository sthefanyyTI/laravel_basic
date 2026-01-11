@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas salas</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-salas-container">

    @if(count($salas) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Pessoas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salas as $sala)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>
                    <a href="/salas/{{ $sala->id }}">{{ $sala->name }}</a>
                </td>
                <td>0</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem sala -
            <a href="/salas/create">Criar uma sala</a>
        </p>
    @endif

</div>
@endsection


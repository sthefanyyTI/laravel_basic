@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas salas</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-salas-container">
    @if(count(salas) > 0)
    @else
    <p>Você ainda não tem sala - <a href="/salas/create">Criar uma sala</a></p>
    @endif

</div>
@endsection

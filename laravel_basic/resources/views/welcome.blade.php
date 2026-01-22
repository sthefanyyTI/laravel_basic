@extends('layouts.main')
@section('title', 'KIDS IBG')
@section('content')

{{-- 
@foreach($salas as $sala)
    <p>{{ $sala->name }} - {{ $sala->description }}</p>
@endforeach 
--}}

<div id="search-container" class="col-md-12"> 
        <h1>Busque por Sala:</h1> 
        <form action="/" method="GET"> 
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar"> 
        </form> 
</div>

<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
        <p class="subtitle">Veja as próximas salas aqui</p>
    @endif

    <div class="row" id="cards-container">
        @foreach($salas as $sala)
            <div class="card col-md-3">
                <img src="/img/salas/{{ $sala->image }}" class="card-img-topalt="{{ $sala->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/y', strtotime($sala->date)) }}</p>
                    <h5 class="card-sala">{{ $sala->name }}</h5>
                    <p class="card-participantes"> {{ count($sala->users) }} Participantes </p>
                    <a href="/salas/{{ $sala->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach

        @if(count($salas) == 0 && $search)
            <p>Não foi possível encontrar a {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($salas) == 0)
            <p>Não há sala disponível</p>
        @endif
    </div>
</div>

@endsection
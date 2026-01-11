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
        <form action=""> 
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar"> 
        </form> 
</div>

<div id="events-container" class="col-md-12">
    <h2>Próximas Salas</h2>
    <p class="subtitle">Veja as próximas salas aqui</p>

    <div class="row" id="cards-container">
        @foreach($salas as $sala)
            <div class="card col-md-3">
                <img src="/img/salas/{{ $sala->image }}" class="card-img-topalt="{{ $sala->title }}">
                <div class="card-body">
                    <p class="card-date">10/01/2026</p>
                    <h5 class="card-title">{{ $sala->title }}</h5>
                    <a href="/salas/{{ $sala->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
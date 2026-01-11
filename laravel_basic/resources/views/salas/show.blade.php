@extends('layouts.main')
@section('title', $sala->name)
@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
<img src="/img/salas/{{ $sala->image }}" class="img-fluid" alt="{{ $sala->name }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $sala->name }}</h1>
                <p class="sala-qty">Quantidade: {{ $sala->qty }}</p>
                <p class="sala-description">Descrição: {{ $sala->description }}</p>
                <a href="#" class="btn btn-primary" id="sala-submit">Confirmar Presença</a>
                <h3>A sala possui:</h3>
                <ul id="itens-list">
                    @if (!empty($sala->items))
                        @foreach ($sala->items as $item)
                            <li><ion-icon name="play-outline"></ion-icon> {{ $item }} </li>
                        @endforeach
                    @else
                        <p>Nenhum item encontrado.</p>
                    @endif
                </ul>
            </div>
    </div>

@endsection
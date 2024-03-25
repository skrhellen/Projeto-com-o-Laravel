@extends('base')
@section('conteudo')
@section('titulo', 'Adição de Joias')
@php
    if (!empty($dado->id)) {
        $route = route('joia.update', $dado->id);
    } else {
        $route = route('joia.store');
    }
@endphp

<h3>Cadastramento de Joias</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome da Joia</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>

    <label for="">Material</label><br>
    <input type="text" name="material" class="form-control"
        value="@if (!empty($dado->material)) {{ $dado->material }}@elseif (!empty(old('material'))){{ old('material') }}@else{{ '' }} @endif"><br>

    <label for="">Valor</label><br>
    <input type="number" name="valor" class="form-control"
        value="@if (!empty($dado->valor)) {{ $dado->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif"><br>

    <label for="">Categorias</label><br>
    <select name="categoria_id" class="form-select">
        @foreach ($categorias as $item)
            <option value="{{ $item->id }}">{{ $item->categorias }}</option>
        @endforeach
    </select><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('joia') }}" class="btn btn-primary">Voltar</a>
</form>

@stop

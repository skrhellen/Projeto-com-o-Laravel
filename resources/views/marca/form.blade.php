@extends('base')
@section('conteudo')
@section('titulo', 'Adição de Marcas')
@php
    if (!empty($dado->id)) {
        $route = route('marca.update', $dado->id);
    } else {
        $route = route('marca.store');
    }
@endphp

<h3>Cadastramento de Marcas</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome da Marca</label><br>
    <input type="text" name="marca" class="form-control"
        value="@if (!empty($dado->marca)) {{ $dado->marca }}@elseif (!empty(old('marca'))){{ old('marca') }}@else{{ '' }} @endif"><br>

    <label for="">cep</label><br>
    <input type="number" name="cep" class="form-control"
        value="@if (!empty($dado->cep)) {{ $dado->cep }}@elseif (!empty(old('cep'))){{ old('cep') }}@else{{ '' }} @endif"><br>

    <label for="">avaliacao</label><br>
    <input type="text" name="avaliacao" class="form-control"
        value="@if (!empty($dado->valor)) {{ $dado->avaliacao }}@elseif (!empty(old('avaliacao'))){{ old('avaliacao') }}@else{{ '' }} @endif"><br>
 
    </select><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('joia') }}" class="btn btn-primary">Voltar</a>
</form>

@stop

@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Aluno')
@php
    if (!empty($dado->id)) {
        $route = route('aluno.update', $dado->id);
    } else {
        $route = route('aluno.store');
    }
@endphp

<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>

    <label for="">Telefone</label><br>
    <input type="text" name="telefone" class="form-control"
        value="@if (!empty($dado->telefone)) {{ $dado->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br>

    <label for="">CPF</label><br>
    <input type="text" name="cpf" class="form-control"
        value="@if (!empty($dado->cpf)) {{ $dado->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br>

    <button type="submit">Salvar</button>
    <button><a href="{{ url('aluno') }}">Voltar</a></button>
</form>

@stop

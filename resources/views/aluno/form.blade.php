@extends('base')
@section('conteudo')

    @php
        if(!empty($dado->id)){
            $route = route('aluno.update',$dado->id);
        } else {
            $route = route('aluno.store') ;
        }
    @endphp

    <form action="{{ $route }}" method="post">

        @csrf


        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ old('nome') }}"><br>

        <label for="">Telefone</label><br>
        <input type="text" name="telefone" value="{{ old('telefone') }}"><br>

        <label for="">CPF</label><br>
        <input type="text" name="cpf" value="{{ old('cpf') }}"><br>

        <button type="submit">Salvar</button>
        <button><a href="{{ url('aluno') }}">Voltar</a></button>
    </form>

@stop

@extends('base')
@section('conteudo')
@section('titulo', 'Listagem de Marcas')

<h3>Listagem de Marcas</h3>

<form action="{{ route('marca.search') }}" method="post">

    <div class="row">
        @csrf
        <div class="col-4">
            <label for="">Marcas</label><br>
            <input type="text" name="marca" class="form-control"><br>
        </div>
        <div class="col-4" style="margin-top: 22px;">
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            <a href="{{ url('joia/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
        </div>
    </div>
</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome da Marca</th>
            <th>cep</th>
            <th>Avaliação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->marca }}</td>
                <td>{{ $item->cep }}</td>
                <td>{{ $item->avaliacao }}</td>
                <td><a href="{{ route('marca.edit', $item->id) }} "class="btn btn-outline-primary" title="Editar"><i
                            class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                    <form action="{{ route('marca.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" title="Deletar"
                            onclick="return confirm('Deseja realmente deletar esse registro?')">
                            <i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

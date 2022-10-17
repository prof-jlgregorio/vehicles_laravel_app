{{-- inherit from view base --}}
@extends('base')

{{-- create a section to specific code --}}
@section('content')
    @if (!is_null($vehicles))
        <table border="1">
            <tr>
                <th>Nome</th><th>Ano</th><th>Cor</th><th colspan="3">Ações</th>
            </tr>
        @foreach ($vehicles as $v)
            <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->year }}</td>
                <td>{{ $v->color }}</td>
                <td> <a href="{{ route('vehicles.show', $v->id) }}">Visualizar</a> </td>
                <td> <a href="{{ route('vehicles.edit', $v->id) }}">Editar</a> </td>
                <td> Excluir </td>
            </tr>
        @endforeach   
        </table> 
    @else
        <h3>Não há veículos cadastrados!</h3>
    @endif

@endsection




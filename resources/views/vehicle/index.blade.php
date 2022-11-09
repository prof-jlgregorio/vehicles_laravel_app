{{-- inherit from view base --}}
@extends('base')

{{-- create a section to specific code --}}
@section('content')
    @if (!is_null($vehicles))
        <table class="table table-hover table-sm">
            <tr>
                <th>Nome</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Marca/Fabricante</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($vehicles as $v)
                <tr>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->year }}</td>
                    <td>{{ $v->color }}</td>
                    <td>{{ $v->brand->name }}</td>
                    <td> <a class="btn btn-info" href="{{ route('vehicles.show', $v->id) }}">Visualizar</a> </td>
                    <td> <a class="btn btn-primary" href="{{ route('vehicles.edit', $v->id) }}">Editar</a> </td>
                    {{-- form to delete the resource --}}
                    <td>
                        <form action="{{ route('vehicles.destroy', $v->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- creating the links to pagination --}}
        <div class="row">
            {{ $vehicles->links('pagination::bootstrap-5') }}
        </div>
    @else
        <h3>Não há veículos cadastrados!</h3>
    @endif

@endsection

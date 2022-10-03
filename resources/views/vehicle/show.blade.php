@extends('base')

@section('content')

<h2>Exibindo Veículo</h2>

<p> <strong>Nome: </strong>{{ $vehicle->name }}</p>
<p> <strong>Ano: </strong>{{ $vehicle->year }}</p>
<p> <strong>Cor: </strong>{{ $vehicle->color }}</p>

<hr>

<a href="{{ route('vehicles.index') }}">Voltar ao Início</a>
    
@endsection
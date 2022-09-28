@extends('base')

@section('content')
    <h2>Cadastrar Novo Veículo</h2>
    <hr>
    <form method="POST" action="{{ route('vehicles.store') }}">
        {{-- protection against cross-site request forgering --}}
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" id="name">
        <label for="color">Cor:</label>
        <input type="text" name="color" id="color">
        <label for="name">Ano:</label>
        <input type="number" name="year" id="year">
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection

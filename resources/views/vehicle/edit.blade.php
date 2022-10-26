@extends('base')

@section('content')
    <h2>Atualizar Veículos</h2>
    <hr>
    <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        {{-- protection against cross-site request forgering --}}
        @csrf
        {{-- change the HTTP verb to update resources --}}
        @method("PUT")
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $vehicle->name }}">
        @error('name')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        <label for="color">Cor:</label>
        <input type="text" name="color" id="color" value="{{ old('color') ? old('color') : $vehicle->color }}">
        @error('color')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        <label for="name">Ano:</label>
        <input type="number" name="year" id="year" value="{{ old('year') ? old('year') : $vehicle->year }}">
        @error('year')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection

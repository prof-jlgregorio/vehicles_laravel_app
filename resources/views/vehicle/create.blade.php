@extends('base')

@section('content')
    <h2>Cadastrar Novo Veículo</h2>
    <hr>
    <form method="POST" action="{{ route('vehicles.store') }}">
        {{-- protection against cross-site request forgering --}}
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        {{-- -------------------------------------------- --}}
        <label for="color">Cor:</label>
        <input type="text" name="color" id="color" value="{{ old('color') }}">
        @error('color')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        {{-- ------------------------------------------ --}}
        <label for="name">Ano:</label>
        <input type="number" name="year" id="year" value="{{ old('year') }}">
        @error('year')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        {{-- ------------------------------------------ --}}
        <label for="brand">Marca/Fabricante</label>
        <select name="brand" id="brand">
            @if($brands)
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{ $brand->name }}</option>
                @endforeach
            @endif
        </select>
        {{-- ------------------------------------------ --}}
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

    {{-- @if(count($errors) > 0)
        {{ dd($errors) }}
    @endif --}}

    {{-- @if($brands)
        {{ dd($brands) }}
    @endif --}}

@endsection

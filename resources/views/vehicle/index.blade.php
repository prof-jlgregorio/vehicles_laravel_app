{{-- inherit from view base --}}
@extends('base')

{{-- create a section to specific code --}}
@section('content')
    
    @if ($vehicles)
        @foreach ($vehicles as $v)
            <p>{{ $v->name }} - {{ $v->year }} - {{ $v->color }}</p>
        @endforeach    
    @else
        <h3>Não há veículos cadastrados!</h3>
    @endif

@endsection




@extends('app')

@section('content')
    <div class="container">
        <h1>Brukere</h1>
        <div class="list-group">
            @foreach($brukere as $bruker)
                <a href="{{ $bruker->id }}" class="list-group-item"> {{ $bruker->fornavn }} {{ $bruker->etternavn }}  </a>
            @endforeach
        </div>
    </div>
@endsection
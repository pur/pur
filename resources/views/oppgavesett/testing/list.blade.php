@extends('pur')
@section('content')


    <h1>Alle oppgavesett</h1>
    <ul>
        @foreach($alleoppgavesett as $oppgavesett)
            <li>{!! link_to_route('oppgavesett.show', $oppgavesett->beskrivelse, [$oppgavesett->id]) !!}</li>
        @endforeach
    </ul>

@endsection

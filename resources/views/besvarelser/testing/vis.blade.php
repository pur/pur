@extends('pur')
@section('content')


    <h1>Besvarelse på '{{ $besvarelse->oppgavesett->beskrivelse }}'</h1>
    <p>Av: {{ $besvarelse->skaper->fulltnavn() }}</p>
    <p>Elevens kommentar til besvarelsen: <i>{{ $besvarelse->kommentar }}</i></p>
    <ul>
        @foreach($besvarelse->oppgavesvar as $oppgavesvar)
            <li>Kommentar til oppgavesvar <b>{{ $oppgavesvar->moduloppgavesvar_id }}</b> : {{ $oppgavesvar->kommentar }}</li>
        @endforeach
    </ul>
    {!! link_to_route('besvarelser.opplist', 'Alle besvarelser') !!}
@endsection

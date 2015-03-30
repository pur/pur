@extends('pur')
@section('content')
<div class="container">

    <h1>{{ $oppgavesett->beskrivelse }}</h1>
    <p>Av: {{ $oppgavesett->skaper->fulltnavn() }}</p>
    <ul>
        @foreach($oppgavesett->oppgaver as $oppgave)
            <li>{{ $oppgave->beskrivelse }}</li>
        @endforeach
    </ul>
    {!! link_to_route('oppgavesett.index', 'Alle oppgavesett') !!}
</div>
@endsection

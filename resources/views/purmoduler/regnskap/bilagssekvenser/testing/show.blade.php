@extends('app')


@section('content')

    <h1>Vis bilagssekvens
        <small>(test)</small>
    </h1>

    <p>
        <b>Sekvenstype:</b> {{ $bilagssekvens->sekvenstype }}<br/>
        <b>Beskrivelse:</b> {{ $bilagssekvens->oppgave->beskrivelse }}<br/>
        <b>Opprettet:</b>   {{ $bilagssekvens->oppgave->tid_opprettet }} <br/>
        <b>Laget av:</b>    {{ $bilagssekvens->oppgave->skaper->etternavn }}<br/>
    </p>
    <h2>Bilagsmaler</h2>
    @foreach($bilagssekvens->bilagsmaler as $bilagsmal)
        <ul>
            <li>{{ $bilagsmal->bilagstype }}</li>
        </ul>
    @endforeach



    {!! link_to_route('bilagssekvens.edit', 'Rediger', [$bilagssekvens->id]) !!}
@endsection
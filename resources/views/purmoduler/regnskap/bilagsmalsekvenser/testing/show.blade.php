@extends('app')


@section('content')

    <h1>Vis bilagsmalsekvens
        <small>(test)</small>
    </h1>

    <p>
        <b>Sekvenstype:</b> {{ $bilagsmalsekvens->sekvenstype }}<br/>
        <b>Beskrivelse:</b> {{ $bilagsmalsekvens->oppgave->beskrivelse }}<br/>
        <b>Opprettet:</b>   {{ $bilagsmalsekvens->oppgave->tid_opprettet }} <br/>
        <b>Laget av:</b>    {{ $bilagsmalsekvens->oppgave->skaper->etternavn }}<br/>
    </p>
    <h2>Bilagsmaler</h2>
    @foreach($bilagsmalsekvens->bilagsmaler as $bilagsmal)
        <ul>
            <li>{{ $bilagsmal->bilagstype }}</li>
        </ul>
    @endforeach



    {!! link_to_route('bilagsmalsekvens.edit', 'Rediger', [$bilagsmalsekvens->id]) !!}
@endsection
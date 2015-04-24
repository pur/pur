@extends('pur')
@section('content')
    @include('oppgavesett._rediger-undermeny')
    <div class="container">

        <h1>{{ $oppgavesett->beskrivelse }}</h1>
        {!! Form::model($oppgavesett, ['route' => ['oppgavesett.oppdater', $oppgavesett->id], 'method' => 'PATCH']) !!}
        <p>Av: {{ $oppgavesett->skaper->fulltnavn() }}</p>
        <p>Beskrivelse: {{ $oppgavesett->beskrivelse}} </p>
        <p>Tekst: Kontantrabatt ved betaling før 60 dager. </p>
        <p>Publiseringstid: {{ $oppgavesett->tidPublisert() }}</p>
        <p>Åpent fra: {{ $oppgavesett->tidAapent()}}</p>
        <p>Åpent til: {{ $oppgavesett->tidLukket() }}</p>

        <div class="clearfix"></div>

        {!! Form::close() !!}
        @include('oppgaver._liste', ['oppgaver' => $oppgavesett->oppgaver, 'kanOpprette' => true])
    </div>
@endsection



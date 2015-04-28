@extends('pur')
@section('content')

    <div class="container">
        <h1>Besvarelse på {{ $besvarelse->oppgavesett->beskrivelse }}</h1>
        <br/>

        <p>Av: {{ $besvarelse->skaper->fulltnavn() }}</p>

        <p>Opprettet: {{ $besvarelse->tidOpprettet() }}</p>

        <p>Leveringsfrist: {{ $besvarelse->oppgavesett->tidLukket() }}</p>

        @if($besvarelse->kommentar != '')
            <p>Kommentar til besvarelsen: <i>{{ $besvarelse->kommentar }}</i></p>
        @endif

        <br/>
        {!! link_to_route('besvarelser.rediger', 'Rediger besvarelse', $besvarelse, ['class' => 'btn btn-default']) !!}
        {!! Form::submit('Levér besvarelse', ['class' => 'btn btn-warning']) !!}
        {!! link_to_route('besvarelser.slett', 'Slett besvarelse', $besvarelse, ['class' => 'btn btn-danger']) !!}
        <br/>
        <br/>
        {!! link_to_route('oppgavesett.opplist', 'Oppgavesett/besvarelser') !!}
    </div>
@endsection

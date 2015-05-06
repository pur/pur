@extends('pur')
@section('content')
    @include('oppgavesett._vis-undermeny')
    <div class="container">

        <h1>{{ $oppgavesett->tittel }}</h1>
        {!! Form::model($oppgavesett, ['route' => ['oppgavesett.oppdater', $oppgavesett->id], 'method' => 'PATCH']) !!}
        <p><b>Beskrivelse: </b> {{ $oppgavesett->beskrivelse }}</p>
        <p><b>Publiseringstid: </b>{{$oppgavesett->tidPublisert()}}</p>
        <p><b>Åpent fra: </b>{{$oppgavesett->tidAapent()}}</p>
        <p><b>Åpent til: </b>{{$oppgavesett->tidLukket()}}</p>


        <div class="clearfix"></div>

        {!! Form::close() !!}
        <section class="padding">
            <h2>Oppgaver</h2>
            @include('oppgaver._liste', ['oppgaver' => $oppgavesett->oppgaver, 'kanOpprette' => true])
        </section>
    </div>

@endsection


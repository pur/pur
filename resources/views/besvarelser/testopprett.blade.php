@extends('pur')
@section('content')

    <div style="padding:5%">
        @foreach($oppgavesettsamling as $oppgavesett)
        {!! Form::model($oppgavesett, ['route' => ['besvarelser.lagre', $oppgavesett], 'method' => 'POST']) !!}
        {{ $oppgavesett->beskrivelse }}
        {!! Form::submit('Opprett besvarelse') !!}
        {!! Form::close() !!}
        @endforeach
    </div>

@endsection
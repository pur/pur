@extends('app')


@section('content')

    <h1>Rediger bilagssekvens <small>(test)</small></h1>

    {!! Form::model($bilagssekvens, ['route' => ['bilagssekvens.update', $bilagssekvens->id], 'method' => 'PATCH']) !!}

    {!! Form::label('sekvenstype', 'Sekvenstype') !!}
    <br/>
    {!! Form::text('sekvenstype', null, ['style' => 'width:300px']) !!}
    <br/>
    {!! Form::label('beskrivelse', 'Beskrivelse') !!}
    <br/>
    {!! Form::text('beskrivelse', $bilagssekvens->oppgave->beskrivelse, ['style' => 'width:300px']) !!}
    <br/><br/>
    {!! Form::submit('Lagre') !!}

    {!! Form::close() !!}

@endsection
@extends('pur')


@section('content')

    <h1>Rediger bilagssekvens
        <small>(test)</small>
    </h1>

    {!! Form::model($bilagssekvens, ['route' => ['bilagssekvens.update', $bilagssekvens->id], 'method' => 'PATCH']) !!}

    {!! Form::label('sekvenstype', 'Sekvenstype') !!}
    <br/>
    {!! Form::text('sekvenstype', null, ['style' => 'width:300px']) !!}
    <br/>
    {!! Form::label('beskrivelse', 'Beskrivelse') !!}
    <br/>
    {!! Form::text('beskrivelse', $bilagssekvens->oppgave->beskrivelse, ['style' => 'width:300px']) !!}
    <br/>
    <br/>
    {!! Form::submit('Lagre') !!}

    {!! Form::close() !!}

    <h2>Bilagsmaler</h2>
    @foreach($bilagssekvens->bilagsmaler as $bilagsmal)
        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'true']) !!}

        <h3>Bilagsmal {{ $bilagsmal->id }}</h3>
        {!! Form::label('bilagstype', 'Bilagstype') !!}
        <br/>
        {!! Form::text('bilagstype', $bilagsmal->bilagstype, ['style' => 'width:300px']) !!}
        <p class="ajax-success">Lagret</p>
        {!! Form::close() !!}

    @endforeach

@endsection


@section('scripts')

    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="/js/ajaxformsubmit.js"></script>

@endsection
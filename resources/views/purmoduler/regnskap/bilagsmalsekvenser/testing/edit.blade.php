@extends('pur')


@section('content')

    <h1>Rediger bilagsmalsekvens
        <small>(test)</small>
    </h1>

    {!! Form::model($bilagsmalsekvens, ['route' => ['bilagsmalsekvens.update', $bilagsmalsekvens->id], 'method' => 'PATCH']) !!}

    {!! Form::label('sekvenstype', 'Sekvenstype') !!}
    <br/>
    {!! Form::text('sekvenstype', null, ['style' => 'width:300px']) !!}
    <br/>
    {!! Form::label('beskrivelse', 'Beskrivelse') !!}
    <br/>
    {!! Form::text('beskrivelse', $bilagsmalsekvens->oppgave->beskrivelse, ['style' => 'width:300px']) !!}
    <br/>
    <br/>
    {!! Form::submit('Lagre') !!}

    {!! Form::close() !!}

    <h2>Bilagsmaler</h2>
    @foreach($bilagsmalsekvens->bilagsmaler as $bilagsmal)

        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
        <h3>Bilagsmal {{ $bilagsmal->id }}</h3>
        {!! Form::label('bilagstype', 'Bilagstype') !!}
        {!! Form::text('bilagstype', $bilagsmal->bilagstype, ['style' => 'width:300px']) !!}
        <p class="ajax-success">Lagret</p>
        {!! Form::close() !!}

        @foreach($bilagsmal->posteringsmaler as $posteringsmal)

            {!! Form::model($posteringsmal, ['route' => ['posteringsmal.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
            <h4>Posteringsmal {{ $posteringsmal->id }}</h4>
            {!! Form::label('formel', 'Formel') !!}
            {!! Form::text('formel', $posteringsmal->formel, ['style' => 'width:300px']) !!}
            {!! Form::label('kontokode', 'Konto') !!}
            {!! Form::select('kontokode', $selectKontoer, $posteringsmal->konto->kontokode) !!}
            <p class="ajax-success">Lagret</p>
            {!! Form::close() !!}

        @endforeach

        <hr />

    @endforeach

@endsection


@section('scripts')

    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="/js/ajaxformsubmit.js"></script>

@endsection
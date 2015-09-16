@extends('pur')
@section('content')

    @include('purmoduler.regnskap.kontoer._opprett-undermeny')

    <div class="container">

        <h1>Ny konto</h1>

        @include('_feilmeldinger')

        {!! Form::open(['route' => 'regnskap.kontoer.lagre']) !!}

        @include('purmoduler.regnskap.kontoer._skjema')

        {!! Form::close() !!}
    </div>

@endsection

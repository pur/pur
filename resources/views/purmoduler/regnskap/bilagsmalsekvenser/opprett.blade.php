@extends('pur')
@section('content')
    @include('purmoduler.regnskap.bilagsmalsekvenser._editSubmenu')

    <div class="container content">

        <h1>Opprett oppgave</h1>
    {!! Form::open(['route' => ['regnskap.oppgaver.lagre']]) !!}
    @include('purmoduler.regnskap.bilagsmalsekvenser._skjema')
    {!! Form::close() !!}

@endsection
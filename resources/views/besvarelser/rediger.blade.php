@extends('pur')
@section('content')
    @include('purmoduler.regnskap.besvarelser._editSubmenu')

    <div class="container">
        <h1>Besvarelse på {{ $besvarelse->oppgavesett->tittel }}</h1>

        <p>Påbegynt: {{ $besvarelse->tidOpprettet('d.m.y') }} – Leveringsfrist: {{ $besvarelse->frist('d.m.y k\l.H:i') }}</p>

        <div class="input-group">
            <div class="input-group-addon"><span class="fa fa-comment"></span> Kommentar til besvarelsen:</div>
            {!! Form::input('text', 'kommentar',  $besvarelse->kommentar, ['class' => 'form-control variabel', 'id' => 'kommentar']) !!}
        </div>

        <!-- TODO : Gjør purmodul-uavhengig: -->

            <h2>Bilag</h2>

            @include('purmoduler.regnskap.besvarelser._rediger')


    </div>
@endsection

@extends('pur')
@section('content')
    @include('purmoduler.regnskap.bilagsmalsekvenser._rediger-undermeny')

    <div class="container content">

        <h1>Opprett oppgave</h1>
        {!! Form::open(['route' => ['regnskap.oppgaver.lagre']]) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-8">
                        <div class="input-group">
                            <div class="input-group-addon">* Beskrivelse: </div>
                            {!! Form::text('beskrivelse', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-addon">* Antall bilag: </div>
                            {!! Form::input('number', 'antall-bilag', 3, ['class' => 'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            {!! Form::submit('Opprett', ['class' => 'btn btn-primary']) !!}
            {!! link_to_route('regnskap.oppgaver.opplist', 'Avbryt', null, ['class' => 'btn btn-warning']) !!}
        </div>

        {!! Form::close() !!}

{{--
        <h2>Variabler</h2>

        <blockquote class="bq-info">
            <p>Legg til variabler som skal brukes i bilagssekvens.</p>

            <p>Elevoppgavene får tilfeldige variabelverdier mellom minimumsverdi og maksimumsverdi.</p>
        </blockquote>

        <div class="row">
            <div class="col-sm-4">
                <b>Variabelnavn:</b>
            </div>
            <div class="col-sm-4">
                <b>Minimumsverdi:</b>
            </div>
            <div class="col-sm-4">
                <b>Maksimumsverdi:</b>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Variabelnavn: </label>

                <div class="input-group">
                    <div class="input-group-addon">a:</div>
                    {!! Form::input('text', 'aNavn', null, ['class' => 'form-control variabel', 'id' => 'aNavn']) !!}
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Minimumsverdi: </label>
                {!! Form::input('number', 'aMin', null, ['min'=>'0', 'class' => 'form-control variabel', 'id' => 'aMin']) !!}
            </div>
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Maksimumsverdi: </label>
                {!! Form::input('number', 'aMaks', null, ['min'=>'0', 'class' => 'form-control variabel', 'id' => 'aMaks']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Variabelnavn: </label>

                <div class="input-group">
                    <div class="input-group-addon">b:</div>
                    {!! Form::input('text', 'bNavn', null, ['class' => 'form-control variabel', 'id' => 'bNavn']) !!}
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Minimumsverdi: </label>
                {!! Form::input('number', 'bMin', null, ['min'=>'0', 'class' => 'form-control variabel', 'id' => 'bMin']) !!}
            </div>
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Maksimumsverdi: </label>
                {!! Form::input('number', 'bMaks', null, ['min'=>'0', 'class' => 'form-control variabel', 'id' => 'bMaks']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Variabelnavn: </label>

                <div class="input-group">
                    <div class="input-group-addon">c:</div>
                    {!! Form::input('text', 'cNavn', null, ['class' => 'form-control variabel', 'id' => 'cNavn']) !!}
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Minimumsverdi: </label>
                {!! Form::input('number', 'cMin', null, ['min'=>'0', 'class' => 'form-control variabel', 'id' => 'cMin']) !!}
            </div>
            <div class="form-group col-sm-4">
                <label class="visible-xs-inline">Maksimumsverdi: </label>
                {!! Form::input('number', 'cMaks', null, ['min'=>'0', 'class' => 'form-control variabel', 'id' => 'cMaks']) !!}
            </div>
        </div>
        <hr/>
--}}
    </div>
@endsection
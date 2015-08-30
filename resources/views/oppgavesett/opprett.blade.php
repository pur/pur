@extends('pur')
@section('content')
    @include('oppgavesett._rediger-undermeny')

    <div class="container">

        <h1>Nytt oppgavesett</h1>

        @include('_feilmeldinger')

        {!! Form::open(['route' => 'oppgavesett.lagre']) !!}
        {{-- TODO : Lag partiellvisning av skjemainnhold --}}

        <div class="form-group col-sm-6">
            {!! Form::label('tittel', '* Tittel:') !!}
            {!! Form::text('tittel', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('type', '* Type:') !!}
            <div class="radio">
                <label class="radio-inline">
                    {!! Form::radio('type', 'øving') !!} Øvingsoppgavesett
                </label>
                <label class="radio-inline">
                    {!! Form::radio('type', 'oblig') !!} Obligatorisk oppgavesett
                </label>
            </div>
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('beskrivelse', 'Beskrivelse:') !!}
            {!! Form::textarea( 'beskrivelse', null, ['class' => 'form-control', 'style' => 'height: 75px;']) !!}
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('tid_publisert', '* Publiseringstidspunkt:') !!}
            <div class='input-group date' id='datetimepicker3'>
                {!! Form::input('text', 'tid_publisert', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon btn btn-default">
                    <span class="fa fa-calendar"></span>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-6">
            {!!Form::label('tid_aapent', '* Åpent for oppgaveløsing fra:') !!}
            <div class='input-group date' id='datetimepicker1'>
                {!! Form::input('text', 'tid_aapent', null, ['class' => 'form-control']) !!}
                <span class="input-group-addon btn btn-default">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('tid_lukket', '* Åpent for oppgaveløsing til:') !!}
            <div class='input-group date' id='datetimepicker2'>
                {!! Form::input('text', 'tid_lukket', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon btn btn-default">
                    <span class="fa fa-calendar"></span>
                </div>
            </div>

        </div>

        <div class="form-group col-sm-12">
            {!! Form::submit('Opprett', ['class' => 'btn btn-primary']) !!}
            {!! link_to_route('oppgavesett.opplist', 'Avbryt', null, ['class' => 'btn btn-warning']) !!}
        </div>

        <div class="clearfix"></div>
        {!! Form::close() !!}

    </div>
@endsection

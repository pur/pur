@extends('pur')
@section('content')
    @include('oppgavesett._rediger-undermeny')
    <div class="container">

        <h1>{{ $oppgavesett->beskrivelse }}</h1>
        {!! Form::model($oppgavesett, ['route' => ['oppgavesett.oppdater', $oppgavesett->id], 'method' => 'PATCH']) !!}
        <p>Av: {{ $oppgavesett->skaper->fulltnavn() }}</p>

        <div class="form-group col-sm-12">
            <div class="input-group">
                <div class="input-group-addon">Beskrivelse:</div>
                {!! Form::text('beskrivelse', $oppgavesett->beskrivelse, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group col-sm-12">
            {!!Form::label('diverse-tekst', 'Tekst:') !!}
            {!! Form::textarea( 'diverse-tekst', 'Kontantrabatt ved betaling før 60 dager.', ['class' => 'form-control', 'style' => 'height: 75px;']) !!}
        </div>

        <div class="form-group col-sm-12">
            {!!Form::label('harpubliseringstid', 'Publiseringstid:') !!}

            <div class='input-group date' id='datetimepicker3'>
                {!! Form::input('text', 'tid_publisert', $oppgavesett->tidPublisert(), ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </div>
            </div>
            <div class="radio">
                <label class="radio-inline">
            {!! Form::radio('harpubliseringstid', '') !!} Lagre uten å publisere
                </label>

                <label class="radio-inline">
            {!! Form::radio('harpubliseringstid', '') !!} Sett publiseringstid
                    </label>

                <label class="radio-inline">
            {!! Form::radio('harpubliseringstid', '') !!} Publiser umiddelbart
                    </label>
            </div>

        </div>


        <div class="form-group col-sm-6">
            {!!Form::label('tid_aapent', 'Åpent fra: ') !!}

            <div class='input-group date' id='datetimepicker1'>
                {!! Form::input('text', 'tid_aapent', $oppgavesett->tidAapent(), ['class' => 'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tid_aapent', '') !!} Åpne umiddelbart
                </label>
            </div>
        </div>


        <div class="form-group col-sm-6">
            {!!Form::label('tid_lukket', 'Åpent til: ') !!}
            <div class='input-group date' id='datetimepicker2'>
                {!! Form::input('text', 'tid_aapent', $oppgavesett->tidLukket(), ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </div>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tid_lukket', '') !!} Ingen stengetid
                </label>
            </div>
        </div>
        <div class="clearfix"></div>

        {!! Form::close() !!}
        <section>
            <h2>Oppgaver</h2>
        @include('oppgaver._liste', ['oppgaver' => $oppgavesett->oppgaver, 'kanOpprette' => true])
        </section>
    </div>

@endsection


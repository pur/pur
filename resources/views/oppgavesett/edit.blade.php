@extends('pur')
@section('content')
    @include('oppgavesett._editSubmenu')
    <div class="container">

        <h1>{{ $oppgavesett->beskrivelse }}</h1>
        {!! Form::model($oppgavesett, ['route' => ['oppgavesett.update', $oppgavesett->id], 'method' => 'PATCH']) !!}
        <p>Av: {{ $oppgavesett->skaper->fulltnavn() }}</p>

        <div class="form-group col-sm-8">
            <div class="input-group">
                <div class="input-group-addon">Beskrivelse:</div>
                {!! Form::text('beskrivelse', $oppgavesett->beskrivelse, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="input-group pur-dropdown">
                <div class="input-group-addon">Oppgavetype:</div>
                {!!Form::select('oppgavetype', array('1' => 'Obligatorisk oppgave', '2' => 'Øvingsoppgave'), null, ['class' => 'form-control']) !!}
                <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            {!!Form::label('diverse-tekst', 'Tekst:') !!}
            {!! Form::textarea( 'diverse-tekst', 'Kun til info for studentene. F.eks. Kontantrabatt ved betaling før 60 dager.', ['class' => 'form-control', 'style' => 'height: 75px;']) !!}
        </div>


        <div class="form-group col-sm-12 form-inline">
            Åpen fra:
            <div class="input-group">
                {!! Form::input('datetime-local', 'tid_aapent', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tid_aapent', '') !!} Åpne umiddelbart
                </label>
            </div>
        </div>


        <div class="form-group col-sm-12 form-inline">
            {!!Form::label('tid_lukket', 'Åpent til: ') !!}
            <div class="input-group">
                {!! Form::input('datetime-local', 'tid_lukket', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tid_lukket', '') !!} Ingen stengetid
                </label>
            </div>
        </div>

        <div class="form-group col-sm-12">
            {!!Form::label('harpubliseringstid', 'Publiseringstid:') !!}

            <div class="form-inline">

                {!! Form::radio('harpubliseringstid', '') !!} Lagre uten å publisere
                {!! Form::radio('harpubliseringstid', '') !!} Sett publiseringstid
            </div>
        </div>
        <div class="form-group col-sm-12 form-inline">
            <div class="input-group">
                {!! Form::input('datetime-local', 'tid_lukket', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tid_lukket', '') !!} Publiser umiddelbart
                </label>
            </div>
        </div>


        <div class="clearfix"></div>


        {!! Form::close() !!}
        <div class="list-group panel panel-primary" role="tablist" aria-multiselectable="true">
            <div class="panel-heading">
                <div class=" row">
                    <div class="col-sm-1">
                        <input type="checkbox">
                    </div>
                    <div class="col-sm-2">
                        <b>Opprettet</b>
                    </div>
                    <div class="col-sm-4">
                        <b>Beskrivelse:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Sekvenstype:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Sist endret:</b>
                    </div>
                    <div class="col-sm-1">

                    </div>
                </div>
            </div>

            @foreach($oppgavesett->oppgaver as $oppgave)

                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox">
                        </div>
                        <div class="col-sm-2">
                            {!! $oppgave->tid_opprettet !!}
                        </div>
                        <div class="col-sm-4">
                            <a href="/bilagssekvens/{!!$oppgave->id !!}/"> {!!$oppgave->beskrivelse!!}</a>
                        </div>
                        <div class="col-sm-2">
                            Sekvenstype
                        </div>
                        <div class="col-sm-2">
                            {!! $oppgave->tid_endret !!}
                        </div>
                        <div class="col-sm-1">
                            <p><a class="slett-postering"><span class="fa fa-trash-o fa-2x"></span></a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

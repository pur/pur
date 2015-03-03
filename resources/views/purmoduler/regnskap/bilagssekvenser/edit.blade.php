@extends('pur')
@section('content')
    <div class="container">
        <h1>Rediger bilagssekvens</h1>

        {!! Form::model($bilagssekvens, ['route' => ['bilagssekvens.update', $bilagssekvens->id], 'method' => 'PATCH']) !!}
        <div class="row">
            <div class="col-sm-8">

                <div class="row">
                    <div class="form-group col-sm-6">
                        <p>Laget av: {!! $bilagssekvens->skaper->fulltNavn() !!}
                            , {!! $bilagssekvens->oppgave->tid_opprettet !!}</p>

                        <p>Sist endret: {!! $bilagssekvens->oppgave->tid_endret !!}</p>

                        <p>Sekvenstype: {!! $bilagssekvens->sekvenstype !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        {!!Form::label('beskrivelse', 'Beskrivelse:', ['class' => 'control-label']) !!}
                        {!! Form::text('beskrivelse', $bilagssekvens->oppgave->beskrivelse, ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="btn-group">
                    <button type="reset" class="btn btn-danger">Avbryt</button>
                    {!! Form::submit('Lagre', ['class' => 'btn btn-success']) !!}
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Del med andre faglærere
                    </label>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <hr/>



        @foreach($bilagssekvens->bilagsmaler as $bilagsmal)

            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">{{$bilagsmal->bilagstype}}</h3></div>
                <div class="panel-body">
                    {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                    <div class="row">
                        <div class="form-group col-sm-3">
                            {!!Form::label('dato', 'Dato:') !!}

                            {!! Form::input('date', 'dato', null, ['class' => 'form-control']) !!}

                        </div>
                        <div class="form-group col-sm-3">
                            {!!Form::label('bruttobelop-min', 'Minimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::input('number', 'bruttobelop-min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            {!!Form::label('bruttobelop-maks', 'Maksimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::input('number', 'bruttobelop-maks', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            {!!Form::label('rabattsats', 'Rabattsats:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                {!! Form::input('number', 'rabattsats', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-12">


                            {!!Form::label('diverse-tekst', 'Diversetekst:') !!}
                            {!! Form::textarea( 'diverse-tekst', 'Kun til info for studentene. F.eks. Kontantrabatt ved betaling før 60 dager.', ['class' => 'form-control', 'style' => 'height: 75px;']) !!}

                        </div>
                    </div>





                    {!! Form::close() !!}

                    <div class="postering list-group">
                        @foreach($bilagsmal->posteringsmaler as $posteringsmal)
                            {!! Form::model($posteringsmal, ['route' => ['posteringsmal.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                            <div class="row list-group-item">

                                <div class="form-group col-md-4">
                                    {!!Form::label('kontokode', 'Konto:') !!}
                                    {!!Form::select('kontokode', $selectKontoer, $posteringsmal->konto->kontokode, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    {!!Form::label('formel', 'Formel:') !!}
                                    {!! Form::select('formel', $selectFormler, $posteringsmal->formel, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-2">
                                    {!!Form::label('diverse-tekst', 'Bruttobeløp A:') !!}
                                    <select class="form-control">
                                    @foreach($bilagssekvens->bilagsmaler as $bilagsmal)
                                        <option>{{$bilagsmal->bilagstype}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    {!!Form::label('diverse-tekst', 'Bruttobeløp B:') !!}
                                    <select class="form-control">
                                        @foreach($bilagssekvens->bilagsmaler as $bilagsmal)
                                            <option>{{$bilagsmal->bilagstype}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-1">
                                    {!!Form::label('slett', 'Fjern:') !!}
                                    <p><a class="slett-postering"><span class="fa fa-trash-o fa-2x"></span></a></p>
                                    {{-- TODO Slett postering i DB --}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        @endforeach
                        <a class="ny-postering row list-group-item list-group-item-success text-center">
                            Legg til ny postering
                        </a>
                    </div>

                </div>
            </div>

        @endforeach


    </div>

@section('scripts')

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script>
        $('.slett-postering').click(function () {
            $(this).closest('.list-group-item').remove();
        });
    </script>

    <script>
        $('.ny-postering').click(function (event) {
            $(event.target).before(lagPostering());
        });

        function lagPostering() {
            var content = '';
            content += '{!! Form::model($posteringsmal, ["route" => ["posteringsmal.update", $posteringsmal->id], "method" => "PATCH", "submit-async" => "on-form-focusout"]) !!}';
            content += '<div class="row list-group-item">';
            content += '<div class="form-group col-md-4">{!! Form::select("kontokode", $selectKontoer, $posteringsmal->konto->kontokode, ["class" => "form-control"]) !!}</div>';
            content += '<div class="form-group col-md-3">{!! Form::select("formel", $selectFormler, $posteringsmal->formel, ["class" => "form-control"]) !!} </div>';
            content += '<div class="form-group col-md-2">{!! Form::select("formel", $selectFormler, $posteringsmal->formel, ["class" => "form-control"]) !!} </div>';
            content += '<div class="form-group col-md-2">{!! Form::select("formel", $selectFormler, $posteringsmal->formel, ["class" => "form-control"]) !!} </div>';

            content += '<div class="form-group col-md-1"><a class="slett-postering"><span class="fa fa-trash-o fa-2x"></span></a></div>';
            content += '</div>';
            content += '{!! Form::close() !!}';
            return content;
        }
    </script>

    <script src="/js/ajaxformsubmit.js"></script>

@endsection

@endsection
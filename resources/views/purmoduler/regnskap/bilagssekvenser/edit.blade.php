@extends('pur')
@section('content')
    <div class="container">
        <h1>Rediger bilagssekvens</h1>

        {!! Form::model($bilagssekvens, ['route' => ['bilagssekvens.update', $bilagssekvens->id], 'method' => 'PATCH']) !!}
        <div class="row">
            <div class="col-sm-8">

                <div class="row">
                    <div class="form-group col-sm-6">
                        {!!Form::label('bruker', 'Bruker:', ['class' => 'control-label']) !!}
                        {!! Form::text('bruker', $bilagssekvens->oppgave->bruker_id, ['class' => 'form-control', 'readonly']) !!}

                    </div>
                    <div class="form-group col-sm-6">
                        {!!Form::label('sekvenstype', 'Sekvenstype:', ['class' => 'control-label']) !!}
                        {!! Form::text('sekvenstype', null, ['class' => 'form-control', 'readonly']) !!}

                    </div>
                    <div class="form-group col-sm-6">
                        {!!Form::label('beskrivelse', 'Opprettet:', ['class' => 'control-label']) !!}
                        {!! Form::text('opprettet', $bilagssekvens->oppgave->tid_opprettet, ['class' => 'form-control', 'readonly']) !!}

                    </div>
                    <div class="form-group col-sm-6">
                        {!!Form::label('endret', 'Endret:', ['class' => 'control-label']) !!}
                        {!! Form::text('endret', $bilagssekvens->oppgave->tid_endret, ['class' => 'form-control', 'readonly']) !!}

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
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-min', 'Minimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-maks', 'Maksimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-maks', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            {!!Form::label('rabattsats', 'Rabattsats:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                {!! Form::text('rabattsats', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="postering list-group">
                        @foreach($bilagsmal->posteringsmaler as $posteringsmal)
                            {!! Form::model($posteringsmal, ['route' => ['posteringsmal.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                            <div class="row list-group-item">

                                <div class="col-md-5"><h4>Postering {{$posteringsmal->id}}</h4></div>
                                <div class="form-group col-md-3">
                                    {!!Form::select('kontokode', $selectKontoer, $posteringsmal->konto->kontokode, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">

                                    {!! Form::select('formel', array('formelA' => 'formelB', 'formelB' => 'formelC', 'formelC' => 'formelA'), $posteringsmal->formel, ['class' => 'form-control']) !!}

                                </div>
                                <div class="form-group col-md-1">
                                    <a class="btn btn-danger slett-postering">Slett</a>
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
            content += '<div class="col-md-5"><h4>Postering ny</h4></div>';
            content += '<div class="form-group col-md-3">{!!Form::select("konto", array("2343" => "2343 Konto 1", "4324" => "4324 Konto 2", "1284" => "1284 Konto 3"), null, ["class" => "form-control"]) !!}</div>';
            content += '<div class="form-group col-md-3">{!! Form::select("formel", array("formelA" => "formelB", "formelB" => "formelC", "formelC" => "formelA"), null, ["class" => "form-control"]) !!} </div>';
            content += '<div class="form-group col-md-1"> <a class="btn btn-danger slett-postering">Slett</a> </div>';
            content += '</div>';
            content += '{!! Form::close() !!}';
            return content;
        }
    </script>

@endsection
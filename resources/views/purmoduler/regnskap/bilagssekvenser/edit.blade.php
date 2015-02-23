@extends('app')
@section('content')
    <div class="container">
        <h1>Rediger oppgave</h1>

        {!! Form::model($bilagssekvens, array('route' => array('bilagssekvens.update', $bilagssekvens->id))) !!}


        <h2>{{ $bilagssekvens->sekvenstype }}</h2>

        <b>Opprettet:</b>   {{ $bilagssekvens->oppgave->tid_opprettet }} <br/>
        <b>Laget av:</b> {{ $bilagssekvens->oppgave->skaper->fornavn }} {{ $bilagssekvens->oppgave->skaper->etternavn }}<br/>

        <div class="row">
            <div class="form-group col-sm-12">
                {!!Form::label('beskrivelse', 'Beskrivelse:') !!}
                {!! Form::text('beskrivelse', $bilagssekvens->oppgave->beskrivelse, ['class' => 'form-control']) !!}

            </div>
        </div>
        <hr/>
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                @foreach($bilagssekvens->bilagsmaler as $bilagsmal)
                    <li role="presentation" @if($bilagsmal->id == 1)class="active"@endif><a href="#{{$bilagsmal->id}}" aria-controls="inngaaendefaktura" role="tab" data-toggle="tab">{{$bilagsmal->bilagstype}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($bilagssekvens->bilagsmaler as $bilagsmal)
                    <div role="tabpanel" class="tab-pane @if($bilagsmal->id == 1) active @endif "
                         id="{{$bilagsmal->id}}">
                        <div class="panel">
                            <div class="panel panel-body">
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
                                <div class="postering list-group">
                                    <div class="row list-group-item">

                                        <div class="col-md-5"><h4>Postering 1</h4></div>
                                        <div class="form-group col-md-3">
                                            {!!Form::select('konto', array('2343' => '2343 Konto 1', '4324' => '4324 Konto 2', '1284' => '1284 Konto 3'), null, ['class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group col-md-3">
                                            {!!Form::select('konto', array('formel1' => 'Formel 1', 'formel2' => 'Formel 2', 'formel3' => 'Formel 3'), null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group col-md-1">
                                            <a class="btn btn-danger slett-postering">Slett</a>
                                        </div>
                                    </div>
                                    <a class="ny-postering row list-group-item list-group-item-success text-center">
                                        Legg til ny postering
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Del med andre faglærere
            </label>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-success">Opprett oppgave</button>
            <button type="reset" class="btn btn-danger">Avbryt</button>
        </div>

        {!! Form::close() !!}
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
            content += '<div class="row list-group-item">';
            content += '<div class="col-md-5"><h4>Postering 1</h4></div>';
            content += '<div class="form-group col-md-3">{!!Form::select("konto", array("2343" => "2343 Konto 1", "4324" => "4324 Konto 2", "1284" => "1284 Konto 3"), null, ["class" => "form-control"]) !!}</div>';
            content += '<div class="form-group col-md-3">{!!Form::select("konto", array("formel1" => "Formel 1", "formel2" => "Formel 2", "formel3" => "Formel 3"), null, ["class" => "form-control"]) !!} </div>';
            content += '<div class="form-group col-md-1"> <a class="btn btn-danger slett-postering">Slett</a> </div>';
            content += '</div>';
            return content;
        }
    </script>

@endsection
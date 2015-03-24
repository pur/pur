@extends('pur')
@section('content')

    <h1>Rediger bilagsmalsekvens</h1>
    {!! Form::model($bilagsmalsekvens, ['route' => ['bilagsmalsekvens.update', $bilagsmalsekvens->id], 'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="form-group col-sm-6">
                    <p>Laget av: {{ $bilagsmalsekvens->skaper->fulltNavn() . ', ' . $bilagsmalsekvens->tidOpprettet() }}</p>

                    <p>Sist endret: {{ $bilagsmalsekvens->tidEndret() }}</p>

                    <p>Sekvenstype: {{ $bilagsmalsekvens->sekvenstype }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::label('beskrivelse', 'Beskrivelse:', ['class' => 'control-label']) !!}
                    {!! Form::text('beskrivelse', $bilagsmalsekvens->oppgave->beskrivelse, ['class' => 'form-control']) !!}
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

    <div class="row">
        <div class="col-sm-1">
            Motpart:
        </div>
        <div class="col-sm-11">
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon"><span class="fa fa-user"></span></div>
                    {!! Form::input('text', 'motpart', null, ['class' => 'form-control variabel', 'id' => 'motpart']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    @foreach($bilagsmalsekvens->variabler as $variabel)
        <div class="row">
            <div class="col-sm-2">
                <div class="input-group pur-dropdown">
                    <div class="input-group-addon">Variabel</div>
                    {!! Form::select('tegn_i_formel', ['a'=>'a','b'=>'b','c'=>'c','x'=>'x','y'=>'y','z'=>'z'], $variabel->tegn_i_formel, ['class' => 'form-control', 'id' => $variabel->tegn_i_formel . 'Tegn']) !!}
                    <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                </div>
            </div>
            <div class="col-sm-1">
                <b> = </b>
            </div>
            <div class="form-group col-sm-3">
                <div class="input-group">
                    <div class="input-group-addon">Verdi min.</div>
                    {!! Form::input('number', $variabel->tegn_i_formel . 'Min', $variabel->verdi_min, ['class' => 'form-control variabel', 'id' => $variabel->tegn_i_formel . 'Min']) !!}
                </div>
            </div>
            <div class="form-group col-sm-3">
                <div class="input-group">
                    <div class="input-group-addon">Verdi maks.</div>
                    {!! Form::input('number', $variabel->tegn_i_formel . 'Maks', $variabel->verdi_maks, ['class' => 'form-control variabel', 'id' => $variabel->tegn_i_formel . 'Maks']) !!}
                </div>
            </div>
            <div class="form-group col-sm-3">
                <div class="input-group">
                    <div class="input-group-addon">Navn</div>
                    {!! Form::input('text', $variabel->tegn_i_formel . 'navn', $variabel->navn, ['class' => 'form-control variabel', 'id' => $variabel->tegn_i_formel . 'Navn']) !!}
                    <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                </div>
            </div>
        </div>
    @endforeach



    <hr/>

    @foreach($bilagsmalsekvens->bilagsmaler as $bilagsmal)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $bilagsmal->tittel() }}</h3>

                <div class="panel-action-bar pull-right">
                    <a data-toggle="collapse" href="#bilag{{ $bilagsmal->id }}"><span class="fa fa-compress"></span></a>
                    <a><span class="fa fa-close"></span></a>
                </div>
            </div>
            <div id="bilag{{ $bilagsmal->id }}" class="panel-collapse collapse in">
                <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#lagBilag{{ $bilagsmal->id }}" aria-controls="lagBilag" role="tab" data-toggle="tab">Lag bilag</a>
                        </li>
                        <li role="presentation">
                            <a href="#visBilag{{ $bilagsmal->id }}" aria-controls="visBilag" role="tab" data-toggle="tab">Vis bilag</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <!-- Lag bilag tab -->
                        <div role="tabpanel" class="tab-pane active" id="lagBilag{{ $bilagsmal->id }}">
                            <div class="panel-body">
                                {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        {!! Form::checkbox('false', 'motpartEksempel' . $bilagsmal->id) !!} Motpart:
                                        <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
                                    </div>
                                    @foreach($bilagsmalsekvens->variabler as $variabel)
                                        <div class="form-group col-sm-4">
                                            {!! Form::checkbox('false', $variabel->tegn_i_formel . 'Eksempel' . $bilagsmal->id) !!}
                                            {{$variabel->tegn_i_formel}}:
                                            <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}:</span>
                                            <span class="{{$variabel->tegn_i_formel}}Eksempel">{{($variabel->verdi_min +$variabel->verdi_min)/2}}</span>
                                        </div>
                                    @endforeach
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('bilagstekst', 'Bilagstekst:') !!}
                                        {!! Form::textarea( 'bilagstekst', 'Kontantrabatt ved betaling før 60 dager.', ['id' => 'bilagstekst' . $bilagsmal->id, 'class' => 'form-control localstorage', 'style' => 'height: 75px;']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="postering list-group">
                                @foreach($bilagsmal->posteringsmaler as $posteringsmal)
                                    {!! Form::model($posteringsmal, ['route' => ['posteringsmal.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                                    <div class="row list-group-item">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="input-group pur-dropdown">
                                                        <div class="input-group-addon">Konto:</div>
                                                        {!!Form::select('kontokode', $selectKontoer, $posteringsmal->konto->kontokode, ['class' => 'form-control localstorage', 'id' => 'kontokode-' . $posteringsmal->id]) !!}
                                                        <div class="input-group-addon"><span
                                                                    class="fa fa-caret-down"></span></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="input-group pur-dropdown">
                                                        <div class="input-group-addon">Beløp =</div>
                                                        {!! Form::select('formel', $selectFormler, $posteringsmal->formel, ['id' => 'formel-' . $posteringsmal->id, 'class' => 'form-control localstorage formelliste']) !!}
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-caret-down"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <p><a class="slett-postering"><span class="fa fa-trash-o fa-2x"></span></a>
                                            </p>
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


                        <!-- Vis bilag tab -->
                        <div role="tabpanel" class="tab-pane" id="visBilag{{ $bilagsmal->id }}">
                            <div class="panel-body">

                                <p id="bilagstekst{{ $bilagsmal->id }}Vis">{{ $bilagsmal->bilagstekst }}</p>

                                <div id="motpartEksempel{{$bilagsmal->id}}" style="display: none;">
                                    Motpart:
                                    <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
                                </div>

                                @foreach($bilagsmalsekvens->variabler as $variabel)
                                    <div id="{{$variabel->tegn_i_formel}}Eksempel{{$bilagsmal->id}}" class="" style="display: none;">
                                        {{$variabel->tegn_i_formel}}:
                                        <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}:</span>
                                        <span class="{{$variabel->tegn_i_formel}}Eksempel">{{($variabel->verdi_min +$variabel->verdi_min)/2}}</span>
                                    </div>
                                @endforeach


                                <dl class="dl-horizontal">
                                    <span id="aVis{{ $bilagsmal->id }}" style="display: none;">
                                        <dt>A =</dt><dd>
                                            <span class="aEksempel"></span>,- (<span class="aNavnEksempel"></span>)
                                        </dd>
                                    </span>
                                    <span id="bVis{{ $bilagsmal->id }}" style="display: none;">
                                        <dt>B =</dt><dd>
                                            <span class="bEksempel"></span>,- (<span class="bNavnEksempel"></span>)
                                        </dd>

                                    </span>
                                    <span id="xVis{{ $bilagsmal->id }}" style="display: none;">
                                        <dt>X =</dt><dd>
                                            <span class="xEksempel"></span>% (<span class="xNavnEksempel"></span>)
                                        </dd>
                                    </span>
                                    <span id="yVis{{ $bilagsmal->id }}" style="display: none;">
                                        <dt>Y =</dt><dd>
                                            <span class="yEksempel"></span>% (<span class="yNavnEksempel"></span>)
                                        </dd>
                                    </span>
                                    <span id="motpartVis{{ $bilagsmal->id }}" style="display: none;">
                                        <dt>Motpart:</dt><dd><span class="motpartEksempel"></span></dd>
                                    </span>
                                </dl>

                            </div>

                            <div class="postering list-group">
                                @foreach($bilagsmal->posteringsmaler as $posteringsmal)
                                    {!! Form::model($posteringsmal, ['route' => ['posteringsmal.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                                    <div class="row list-group-item">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="form-group col-md-5">
                                                    <span id="kontokode-{{ $posteringsmal->id }}Vis"></span>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <span id="formel-{{ $posteringsmal->id }}Vis"></span>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <span class="bilag{{ $bilagsmal->id }}-formel" id="formel-{{ $posteringsmal->id }}ResultatVis"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">

                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                @endforeach
                                <div class="row list-group-item">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <span>Resultat:</span>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <span></span>

                                            </div>
                                            <div class="form-group col-md-2">
                                                <span id="bilag{{ $bilagsmal->id }}Resultat"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-1">

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endforeach



@section('scripts')

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
            content += '</div';
            content += '{!! Form::close() !!}';
            return content;
        }
    </script>



    <script>
        // Viser og skjuler variabel tekster basert på checkboxer
        $('input[type="checkbox"]').click(function () {
            var idName = $(this).attr("value");
            $("#" + idName).toggle();
        });


        // Henter ut verdier fra tekstfelt
        var aMaks = parseInt($('#aMaks').val());
        var aMin = parseInt($('#aMin').val());
        var bMaks = parseInt($('#bMaks').val());
        var bMin = parseInt($('#bMin').val());
        var xMaks = parseInt($('#xMaks').val());
        var xMin = parseInt($('#xMin').val());


        // Oppdaterer checkbox tekst fra inputfelt med variabler
        $('input.variabel').keyup(function () {
            var idName = $(this).attr("id");
            var str = $(this).val();

            if (idName == 'aMaks') {
                aMaks = parseInt(str)
            }
            if (idName == 'aMin') {
                aMin = parseInt(str)
            }
            if (idName == 'bMaks') {
                bMaks = parseInt(str)
            }
            if (idName == 'bMin') {
                bMin = parseInt(str)
            }
            if (idName == 'xMaks') {
                xMaks = parseInt(str)
            }
            if (idName == 'xMin') {
                xMin = parseInt(str)
            }

            if (idName == 'aMaks' || idName == 'aMin') {
                $('.aEksempel').text((aMaks + aMin) / 2);
            } else if (idName == 'bMaks' || idName == 'bMin') {
                $('.bEksempel').text((bMaks + bMin) / 2);
            } else if (idName == 'xMaks' || idName == 'xMin') {
                $('.xEksempel').text((xMaks + xMin) / 2);
            } else {
                $('.' + idName + 'Eksempel').text(str);
            }

        });


        // Legge til valgt option tekst i localstorage
        $('select.localstorage').change(function () {
            if ('input[type="select"]') {
                var idName = $(this).attr("id");
                var str = $(this).find('option:selected').text();
                $("#" + idName + "Vis").text(str);
            }
        });


        $("select.formelliste").change(function () {
            var formelnr = $(this).val();
            var verdia = $(".aEksempel").first().text();
            var verdib = $(".bEksempel").first().text();
            var verdix = $(".xEksempel").first().text();
            var verdiy = $(".yEksempel").first().text();
            var idName = $(this).attr("id");
            var idBilag = $(this).closest(".panel-collapse").attr("id");
            //var sumBilag = parseInt($('#' + idBilag + '-formel').text());
            var sumBilag = 0;

            var request = $.ajax({
                type: "GET",
                url: '/formel',
                dataType: 'json',
                data: {
                    formelid: formelnr, verdi1: verdia, verdi2: verdib, verdi3: verdix
                }
            });

            request.done(function (msg) {
                $("#" + idName + "ResultatVis").text(msg);


                $('.' + idBilag + '-formel').each(function () {
                    if (parseFloat($(this).text()) != '') {
                        console.log('.' + idBilag + '-formel');
                        sumBilag += parseFloat($(this).text());
                        console.log(sumBilag);
                    } else {
                        sumBilag += 0;
                    }
                });
                $("#" + idBilag + "Resultat").text(sumBilag);
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        });


    </script>


    <script src="/js/ajaxformsubmit.js"></script>

@endsection

@endsection
@extends('pur')
@section('content')

    <h1>Rediger bilagssekvens</h1>
    {!! Form::model($bilagssekvens, ['route' => ['bilagssekvens.update', $bilagssekvens->id], 'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="form-group col-sm-6">
                    <p>Laget av: {{ $bilagssekvens->skaper->fulltNavn() . ', ' . $bilagssekvens->tidOpprettet() }}</p>

                    <p>Sist endret: {{ $bilagssekvens->tidEndret() }}</p>

                    <p>Sekvenstype: {{ $bilagssekvens->sekvenstype }}</p>
                </div>
            </div>
            <div class="row">
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
    <p>Variabler:</p>
    <div class="row">
        <div class="col-sm-1">
            Beløp A:
        </div>
        <div class="col-sm-11">
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">kr</div>
                    {!! Form::input('number', 'aMin', null, ['class' => 'form-control  localstorage', 'id' => 'aMin']) !!}
                    <div class="input-group-addon">Min</div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">kr</div>
                    {!! Form::input('number', 'aMaks', null, ['class' => 'form-control  localstorage', 'id' => 'aMaks']) !!}
                    <div class="input-group-addon">Maks</div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="input-group pur-dropdown">
                    <div class="input-group-addon pur-dropdown">Navn</div>
                    <select class="form-control localstorage" name="aNavn" id="aNavn">
                        <option value="Bruttobeløp">Bruttobeløp</option>
                        <option value="Annet beløp">Annet beløp</option>
                    </select>

                    <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            Beløp B:
        </div>
        <div class="col-sm-11">
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">kr</div>
                    {!! Form::input('number', 'bMin', null, ['class' => 'form-control localstorage', 'id' => 'bMin']) !!}
                    <div class="input-group-addon">Min</div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">kr</div>
                    {!! Form::input('number', 'bMaks', null, ['class' => 'form-control localstorage', 'id' => 'bMaks']) !!}
                    <div class="input-group-addon">Maks</div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="input-group pur-dropdown">
                    <div class="input-group-addon">Navn</div>
                    <select class="form-control" name="bNavn" id="bNavn">
                        <option value="Bruttobeløp">Bruttobeløp</option>
                        <option value="Annet beløp">Annet beløp</option>
                    </select>

                    <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            Sats X:
        </div>
        <div class="col-sm-11">
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">%</div>
                    {!! Form::input('number', 'xSats', null, ['class' => 'form-control localstorage', 'id' => 'xSats']) !!}
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="input-group pur-dropdown">
                    <div class="input-group-addon">Navn</div>
                    <select class="form-control" name="xNavn" id="xNavn">
                        <option value="Rabattsats">Rabattsats</option>
                        <option value="Arbeidgiveravgift">Arbeidsgiveravgift</option>
                    </select>

                    <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            Sats Y:
        </div>
        <div class="col-sm-11">
            <div class="form-group col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">%</div>
                    {!! Form::input('number', 'ySats', null, ['class' => 'form-control localstorage', 'id' => 'ySats']) !!}
                </div>
            </div>

            <div class="form-group col-sm-4">
                <div class="input-group pur-dropdown">
                    <div class="input-group-addon">Navn</div>
                    <select class="form-control" name="yNavn" id="yNavn">
                        <option value="Rabattsats">Rabattsats</option>
                        <option value="Arbeidgiveravgift">Arbeidsgiveravgift</option>
                    </select>

                    <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                </div>
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
                    {!! Form::input('text', 'motpart', null, ['class' => 'form-control localstorage', 'id' => 'motpart']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    <hr/>

    @foreach($bilagssekvens->bilagsmaler as $bilagsmal)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $bilagsmal->tittel() }}</h3>

                <div class="panel-action-bar pull-right">
                    <a data-toggle="collapse" href="#bilag{{ $bilagsmal->id }}"><span
                                class="fa fa-compress"></span></a>
                    <a><span class="fa fa-close"></span></a>
                </div>
            </div>
            <div id="bilag{{ $bilagsmal->id }}" class="panel-collapse collapse in">
                <div class="panel-body">
                    {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
                    <div class="row">
                        <div class="form-group col-sm-4">
                            {!! Form::checkbox('false', '') !!} A: <span class="aNavnEksempel"></span> eks. <span
                                    class="aEksempel"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::checkbox('false', '') !!} B: <span class="bNavnEksempel"></span> eks. <span class="bEksempel"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::checkbox('false', '') !!} X: <span class="xNavnEksempel"></span> eks. <span
                                        class="xEksempel"></span>%
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::checkbox('false', '') !!} Y: <span class="yNavnEksempel"></span> eks. <span
                                        class="yEksempel"></span>%
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::checkbox('false', '') !!} Motpart: <span class="motpartEksempel"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('diverse-tekst', 'Diversetekst:') !!}
                            {!! Form::textarea( 'diverse-tekst', 'Kun til info for studentene. F.eks. Kontantrabatt ved betaling før 60 dager.', ['class' => 'form-control', 'style' => 'height: 75px;']) !!}
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
                                            {!!Form::select('kontokode', $selectKontoer, $posteringsmal->konto->kontokode, ['class' => 'form-control']) !!}
                                            <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group pur-dropdown">
                                            <div class="input-group-addon">Beløp =</div>
                                            {!! Form::select('formel', $selectFormler, $posteringsmal->formel, ['class' => 'form-control']) !!}
                                            <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--
                                    <div class="form-group col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">a =</div>
                                            {!! Form::select('formelbilag_b', $bilagssekvens->selectBilagsmaler(), $posteringsmal->formel, ['class' => 'form-control']) !!}

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">b =</div>
                                            {!! Form::select('formelbilag_b', $bilagssekvens->selectBilagsmaler(), $posteringsmal->formel, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    -->
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            beløp = &fnof;(a,b) = -(bruttobeløp a - bruttobeløp b * (100 - rabattsats
                                            a))
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-1">
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
            content += '</div>';
            content += '{!! Form::close() !!}';
            return content;
        }
    </script>

    <script src="/js/ajaxformsubmit.js"></script>

    <script>
        // Fyller input felter og checkboxtekster med data fra localstorage
        $(document).ready(function () {
            function init() {
                if (localStorage["aMin"]) {
                    $('#aMin').val(localStorage["aMin"]);
                }
                if (localStorage["aMaks"]) {
                    $('#aMaks').val(localStorage["aMaks"]);
                }
                if (localStorage["aMaks"] && localStorage["aMin"]) {
                    var aEksempel = (parseInt(localStorage["aMin"]) + parseInt(localStorage["aMaks"])) / 2;
                    $('.aEksempel').html(aEksempel);
                }
                if (localStorage["bMin"]) {
                    $('#bMin').val(localStorage["bMin"]);
                }
                if (localStorage["bMaks"]) {
                    $('#bMaks').val(localStorage["bMaks"]);
                }
                if (localStorage["bMaks"] && localStorage["bMin"]) {
                    var bEksempel = (parseInt(localStorage["bMin"]) + parseInt(localStorage["bMaks"])) / 2;
                    $('.bEksempel').html(bEksempel);
                }
                if (localStorage["xSats"]) {
                    $('#xSats').val(localStorage["xSats"]);
                    $('.xEksempel').html(localStorage["xSats"]);
                }
                if (localStorage["ySats"]) {
                    $('#ySats').val(localStorage["ySats"]);
                    $('.yEksempel').html(localStorage["ySats"]);
                }
                if (localStorage["motpart"]) {
                    $('#motpart').val(localStorage["motpart"]);
                    $('.motpartEksempel').html(localStorage["motpart"]);
                }
                if (localStorage["aNavn"]) {
                    $('#aNavn').val(localStorage["aNavn"]);
                    $(".aNavnEksempel").text(localStorage["aNavn"]);
                }
                if (localStorage["bNavn"]) {
                    $('#bNavn').val(localStorage["bNavn"]);
                    $(".bNavnEksempel").text(localStorage["bNavn"]);
                }
                if (localStorage["xNavn"]) {
                    $('#xNavn').val(localStorage["xNavn"]);
                    $(".xNavnEksempel").text(localStorage["xNavn"]);
                }
                if (localStorage["yNavn"]) {
                    $('#yNavn').val(localStorage["yNavn"]);
                    $(".yNavnEksempel").text(localStorage["yNavn"]);
                }
            }
            init();
        });

        // Oppdaterer checkbox tekst fra inputfelt med tekst/nummer
        $('.localstorage').keyup(function () {
            localStorage[$(this).attr('name')] = $(this).val();
            if (localStorage["aMaks"] && localStorage["aMin"]) {
                var aEksempel = (parseInt(localStorage["aMin"]) + parseInt(localStorage["aMaks"])) / 2;
                $('.aEksempel').html(aEksempel);
            }
            if (localStorage["bMaks"] && localStorage["bMin"]) {
                var bEksempel = (parseInt(localStorage["bMin"]) + parseInt(localStorage["bMaks"])) / 2;
                $('.bEksempel').html(bEksempel);
            }
            if (localStorage["xSats"]) {
                $('.xEksempel').html(localStorage["xSats"]);
            }
            if (localStorage["ySats"]) {
                $('.yEksempel').html(localStorage["ySats"]);
            }
            if (localStorage["motpart"]) {
                $('.motpartEksempel').html(localStorage["motpart"]);
            }
        });

        // Oppdaterer localstorage fra select felter
        document.getElementById("aNavn").onchange = function () {
            localStorage[$(this).attr('name')] = document.getElementById("aNavn").value;
        }
        document.getElementById("bNavn").onchange = function () {
            localStorage[$(this).attr('name')] = document.getElementById("bNavn").value;
        }
        document.getElementById("xNavn").onchange = function () {
            localStorage[$(this).attr('name')] = document.getElementById("xNavn").value;
        }
        document.getElementById("yNavn").onchange = function () {
            localStorage[$(this).attr('name')] = document.getElementById("yNavn").value;
        }

        // Oppdaterer checkbox tekst fra select felter
        $("select").change(function () {
            $(".aNavnEksempel").text(localStorage["aNavn"]);
            $(".bNavnEksempel").text(localStorage["bNavn"]);
            $(".xNavnEksempel").text(localStorage["xNavn"]);
            $(".yNavnEksempel").text(localStorage["yNavn"]);
        });

    </script>

@endsection

@endsection
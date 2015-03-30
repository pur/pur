@extends('pur')
@section('content')
    @include('purmoduler.regnskap.bilagsmalsekvenser._editSubmenu')

    <div class="container content">
        <h1>Rediger bilagsmalsekvens</h1>
        {!! Form::model($bilagsmalsekvens, ['route' => ['bilagsmalsekvens.update', $bilagsmalsekvens->id], 'method' => 'PATCH']) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-8">
                        <p>Laget av: {{ $bilagsmalsekvens->skaper->fulltNavn() . ', ' . $bilagsmalsekvens->tidOpprettet() }}</p>

                        <p>Sist endret: {{ $bilagsmalsekvens->tidEndret() }}</p>

                        <p>Sekvenstype: {{ $bilagsmalsekvens->sekvenstype }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-8">
                        {!! Form::label('beskrivelse', 'Beskrivelse:', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon">Beskrivelse</div>
                            {!! Form::text('beskrivelse', $bilagsmalsekvens->oppgave->beskrivelse, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        {!! Form::label('beskrivelse', 'Motpart:', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-user"></span></div>
                            {!! Form::input('text', 'motpart', null, ['class' => 'form-control variabel', 'id' => 'motpart']) !!}
                        </div>
                    </div>
                </div>

            </div>

        </div>

        {!! Form::close() !!}
        <hr/>

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
                            @include('purmoduler.regnskap.bilagsmalsekvenser._lagBilag')


                            <!-- Vis bilag tab -->
                            @include('purmoduler.regnskap.bilagsmalsekvenser._visBilag')



                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@section('scripts')

    <script>
        $('.slett-postering').click(function () {
            $(this).closest('.list-group-item').remove();
        });
    </script>

    <script>

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
        var aSnitt = (aMin + aMaks) / 2;
        var bSnitt = (bMin + bMaks) / 2;
        var xSnitt = (xMin + xMaks) / 2;

        $('select.kontoliste').each(function () {
            if ('input[type="select"]') {
                var idName = $(this).attr("id");
                var str = $(this).find('option:selected').text();
                $("#" + idName + "Vis").text(str);
            }
        });

        $('select.formelliste').each(function () {
            if ('input[type="select"]') {
                var idName = $(this).attr("id");
                var str = $(this).find('option:selected').text();
                $("#" + idName + "Vis").text(str);
            }
        });

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
                aSnitt = (aMaks + aMin) / 2;
                $('.aEksempel').text(aSnitt);
            } else if (idName == 'bMaks' || idName == 'bMin') {
                bSnitt = (bMaks + bMin) / 2;
                $('.bEksempel').text(bSnitt);
            } else if (idName == 'xMaks' || idName == 'xMin') {
                xSnitt = (xMaks + xMin) / 2;
                $('.xEksempel').text(xSnitt);
            } else {
                $('.' + idName + 'Eksempel').text(str);
            }

        });


        // Legge til valgt konto i vis bilag
        $('select.kontoliste').change(function () {
            if ('input[type="select"]') {
                var idName = $(this).attr("id");
                var str = $(this).find('option:selected').text();
                $("#" + idName + "Vis").text(str);
            }
        });


        $("select.formelliste").change(function () {
            if ('input[type="select"]') {
                var idName = $(this).attr("id");
                var str = $(this).find('option:selected').text();
                $("#" + idName + "Vis").text(str);
            }

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
@extends('pur')
@section('content')

    <div class="container">
        <div class="jumbotron">

            <h1>Kostnads- og inntektsanalyse</h1>

        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="container">

                    <div id="tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#totaldiagram">Totaldiagram</a></li>
                            <li><a href="#enhetsdiagram">Enhetsdiagram</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="totaldiagram" class="tab-pane fade in active"></div>

                            <div id="enhetsdiagram" class="tab-pane fade in active"></div>

                            <div id="enhetsKnapper">
                                <button type="button" value="1" class="btn btn-success" id="pris">pris</button>
                                <button type="button" value="1" class="btn btn-primary" id="TEK">TEK</button>
                                <button type="button" value="1" class="btn btn-danger" id="DEK">DEK</button>
                                <button type="button" value="1" class="btn btn-warning" id="DEI" onclick="click(DEI);">
                                    DEI
                                </button>
                            </div>
                            <div id="totalKnapper" style="visibility: hidden">
                                <button type="button" value="1" class="btn btn-danger" id="TK">TK</button>
                                <button type="button" value="1" class="btn btn-success" id="TI">TI</button>
                                <button type="button" value="1" class="btn btn-primary" id="VK">VK</button>
                                <button type="button" value="1" class="btn btn-warning" id="FK">FK</button>
                                <button type="button" value="1" class="btn default" id="DB">DB</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <br>
                <br>
                <h3>Spørsmål</h3>
                {{ $instans->oppgave->sporsmal() }}

                {{--@foreach($instans->oppgave->sporsmal as $sporsmal)--}}
                    {{--@include('purmoduler.koi-analyse._sporsmal', $sporsmal)--}}
                {{--@endforeach--}}
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://maurizzzio.github.io/function-plot/js/function-plot.js"></script>

    <script>

        var a = "{{ $instans->a }}";
        var b = "{{ $instans->b }}";
        var c = "{{ $instans->c }}";
        var d = "{{ $instans->d }}";
        var m = "{{ $instans->m }}";
        var n = "{{ $instans->n }}";
        var q = "{{ $instans->q }}";
        var kapasitet = "{{ $instans->kapasitet }}";

        enhetsdiagram(1, 1, 1, 1);
        totaldiagram(1, 1, 1, 1, 1);

        function totaldiagram(red, green, blue, yellow, black) {
            var kurvetabell = new Array();
            var index = 0;
            if (red == 1) { // TK
                kurvetabell[index] = {fn: a + '*x^3 + ' + b + '*x^2 + ' + c + '*x +' + d, color: 'red'};
                index++;
            }
            if (green == 1) { // TI
                kurvetabell[index] = {fn: m + '*x^2 +' + n + '*x', color: 'green'};
                index++;
            }
            if (blue == 1) { // VK
                kurvetabell[index] = {fn: a + '*x^3 + ' + b + '*x^2 + ' + c + '*x', color: 'blue'};
                index++;
            }
            if (yellow == 1) { // FK
                kurvetabell[index] = {fn: d, color: 'yellow'};
                index++;
            }
            if (black == 1) { // DB
                kurvetabell[index] = {fn: a + '*x^3 + ' + (m - b) + '*x^2 + ' + (n - c) + '*x', color: 'black'};
                index++;
            }
            functionPlot({
                target: '#totaldiagram',
                tip: {
                    xLine: true,    // dashed line parallel to y = 0
                    yLine: true,    // dashed line parallel to x = 0
                    renderer: function (x, y, index) {
                    }
                },
                width: 500,
                height: 500,
                disableZoom: true,
                xAxis: {
                    domain: [x1, x2]
                },
                yAxis: {
                    domain: [y1, y2]
                },
                data: kurvetabell
            });
        }
        ;

        function enhetsdiagram(blue, red, green, yellow) {   //default vindu!
            var kurvetabell = new Array();
            var index = 0;
            if (blue == 1) { // TEK
                kurvetabell[index] = {fn: a + '*x^2 +' + b + '*x +' + c + '+' + d + '/x', color: 'blue'};
                index++;
            }
            if (red == 1) { // DEK
                kurvetabell[index] = {fn: '3*' + a + '*x^2 + 2*' + b + '*x +' + c, color: 'red'};
                index++;
            }
            if (green == 1) { // Pris
                kurvetabell[index] = {fn: m + '*x +' + n, color: 'green'};
                index++;
            }
            if (yellow == 1) { // DEI
                kurvetabell[index] = {fn: '2*' + m + '*x +' + n, color: 'yellow'};
                index++;
            }
            functionPlot({
                target: '#enhetsdiagram',
                tip: {
                    xLine: true,
                    yLine: true,
                    renderer: function (x, y, index) {
                    }
                },
                width: 500,
                height: 500,
                disableZoom: true,
                grid: true,
                xAxis: {
                    domain: [-10, kapasitet]
                },
                yAxis: {
                    domain: [-1000, 10000]
                },
                data: kurvetabell
            });
        }
        ;

        function tab() {   // viser de ulike fanene med tilhørende knapper.
            var skiftTab = 1;

            $('.nav-tabs a[href="#enhetsdiagram"]').tab('show');

            $(document).ready(function () {
                $(".nav-tabs a").click(function () {
                    $(this).tab('show');

                    if (skiftTab == 1) {
                        document.getElementById('enhetsKnapper').style.visibility = 'hidden';
                        document.getElementById('totalKnapper').style.visibility = 'visible';
                        skiftTab = 0;
                    }
                    else { // knapper for enhetsdiagram skal skjules.
                        document.getElementById('enhetsKnapper').style.visibility = 'visible';
                        document.getElementById('totalKnapper').style.visibility = 'hidden';
                        skiftTab = 1;
                    }
                });
            });
        }

    </script>



@endsection

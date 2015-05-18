@extends('pur')

@section('content')
    <div class="container">

        <h1>Fagmoduler</h1>
            <div class="row">
                <div class="fagmodul col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb.jpg" alt="...">
                        <div class="caption">
                            <h3>pur:Regnskap</h3>

                            <p>Tren på å føre regnskap<br/> - og bare det!</p>

                            <p><a href="{{ URL::route('oppgavesett.opplist') }}" class="btn btn-default" role="button">Velg</a>
                                <a class="btn btn-default disabled" role="button">Info</a></p>
                        </div>
                    </div>
                </div>
                <div class="fagmodul col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb-disabled.png" alt="...">

                        <div class="caption">
                            <h3>pur:Modul</h3>

                            <p>Lag meg!<br/><a href="#">Hvordan?</a></p>

                            <p><a class="btn btn-default disabled" role="button">Velg</a>
                                <a class="btn btn-default disabled" role="button">Info</a></p>
                        </div>
                    </div>
                </div>
                <div class="fagmodul col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb-disabled.png" alt="...">

                        <div class="caption">
                            <h3>pur:Modul</h3>

                            <p>Lag meg!<br/><a href="#">Hvordan?</a></p>

                            <p><a class="btn btn-default disabled" role="button">Velg</a>
                                <a class="btn btn-default disabled" role="button">Info</a></p>
                        </div>
                    </div>
                </div>
                <div class="fagmodul col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb-disabled.png" alt="...">

                        <div class="caption">
                            <h3>pur:Modul</h3>

                            <p>Lag meg!<br/><a href="#">Hvordan?</a></p>

                            <p><a class="btn btn-default disabled" role="button">Velg</a>
                                <a class="btn btn-default disabled" role="button">Info</a></p>
                        </div>
                    </div>
                </div>


            </div>

    </div>
@endsection

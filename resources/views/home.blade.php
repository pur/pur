@extends('pur')

@section('content')
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        You are logged in!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb.jpg" alt="...">

                <div class="caption">
                    <h3>pur:Regnskap</h3>

                    <p>Tren på å føre regnskap - og bare det!</p>

                    <p><a href="#" class="btn btn-primary" role="button">Velg</a>
                        <a href="#" class="btn btn-default" role="button">Info</a></p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb.jpg" alt="...">

                <div class="caption">
                    <h3>pur:SQL</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    <p><a href="#" class="btn btn-primary" role="button">Velg</a>
                        <a href="#" class="btn btn-default" role="button">Info</a></p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb.jpg" alt="...">

                <div class="caption">
                    <h3>pur:Java</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    <p><a href="#" class="btn btn-primary" role="button">Velg</a>
                        <a href="#" class="btn btn-default" role="button">Info</a></p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb.jpg" alt="...">

                <div class="caption">
                    <h3>pur:Statistikk</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    <p><a href="#" class="btn btn-primary" role="button">Velg</a>
                        <a href="#" class="btn btn-default" role="button">Info</a></p>
                </div>
            </div>
        </div>


    </div>

@endsection

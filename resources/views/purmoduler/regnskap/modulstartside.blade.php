@extends('pur')
@section('content')
    @include('purmoduler.regnskap._opplist-undermeny')
    <div class="container">
        <h1>pur:Regnskap</h1>

        <div class="row">
            <div class="col-sm-4 col-md-3">

                <img class="img-responsive" src="{{ env('APPWEBPATH') }}/images/module-thumbs/test-thumb.jpg" alt="...">

                <hr/>

            </div>

            <div class="col-sm-6 col-md-7">
                <p class="lead">Tren på å føre regnskap – og bare det!</p>

                @if(Auth::user()->erLaerer())
                    <b>pur:Regnskap for lærere</b>
                    <p>Info...</p>

                    <b>pur:Regnskap for studenter</b>
                @endif
                <p>Info...</p>

                <p>
                    <a href="{{ URL::route('oppgavesett.opplist', null) }}" class="btn btn-default" role="button">Oppgavesett</a>
                    @if(Auth::user()->erLaerer())
                        <a href="{{ URL::route('oppgaver.opplist', null) }}" class="btn btn-default" role="button">Oppgaver</a>
                    @endif
                </p>


            </div>
            <div class="col-md-2">


            </div>


        </div>


    </div>
@endsection

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
                <p class="lead">Tren på å føre regnskap<br/> - og bare det!</p>

                @if(Auth::user()->erLaerer())
                    <b>pur:Regnskap for lærere</b>
                    <p>Som faglærer kan du legge inn nye oppgaver med tilhørende fasiter.
                        Faglærere kan opprette nye oppgavesett og velge mellom åpne oppgaver uten frist og obligatoriske oppgaver med satte frister.</p>

                    <p>Det kan også genereres tilfeldige beløpsvariabler for oppgavene. Dette vil gi et uendelig antall unike oppgaver og løser problemet med at studenter leverer direkte avskrift av hverandre ved innleveringer.
                    </p>
                    <b>pur:Regnskap for elever</b>
                @endif



                <p>Med pur:Regnskap kan du som elev legge inn bokføringer og se resultatet på saldobalansen. Du får tilbakemelding på om innlagt svar er korrekt eller ikke, og har mulighet til å se fasit.</p>


                <p>
                    <a href="{{ URL::route('oppgavesett.opplist', null) }}" class="btn btn-default" role="button">Oppgavesett</a>
                    @if(Auth::user()->erLaerer())
                        <a href="{{ URL::route('oppgaver.vis', null) }}" class="btn btn-default" role="button">Oppgaver</a>
                    @endif
                </p>


            </div>
            <div class="col-md-2">


            </div>


        </div>


    </div>
@endsection

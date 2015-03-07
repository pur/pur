@extends('pur')
@section('content')

        <h1>Rediger bilagssekvens</h1>


        <div class="row">
            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-6">
                        <p>Laget av: {!! $bilagssekvens->skaper->fulltNavn() !!}
                            , {!! $bilagssekvens->oppgave->tid_opprettet !!}</p>

                        <p>Sist endret: {!! $bilagssekvens->oppgave->tid_endret !!}</p>

                        <p>Sekvenstype: {!! $bilagssekvens->sekvenstype !!}</p>
                    </div>

                    <div class="col-sm-12">

                      <p>Beskrivelse:   {!!$bilagssekvens->oppgave->beskrivelse !!} </p>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="btn-group">
                    <a href="../" class="btn btn-danger">Tilbake</a>
                    <a href="edit/" class="btn btn-primary">Rediger</a>
                    <button type="reset" class="btn btn-info">Skriv ut</button>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked disabled> Delt med andre faglærere
                    </label>
                </div>
            </div>
        </div>

        <hr/>



        @foreach($bilagssekvens->bilagsmaler as $bilagsmal)

            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">{{$bilagsmal->bilagstype}}</h3></div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-4">
                            <b>Minimum bruttobeløp:</b>
                            kr
                            {!!  $bilagsmal->bruttobelop_min !!}

                        </div>
                        <div class="col-sm-4">
                            <b>Maksimum bruttobeløp:</b>
                                kr
                                {!!  $bilagsmal->bruttobelop_maks !!}

                        </div>
                        <div class="col-sm-4">
                            <b> Rabattsats:</b>
                            %
                            {!!  $bilagsmal->rabattsats !!}

                        </div>
                        <div class="col-sm-12">
                          <b>Diversetekst:</b>
                           Kun til info for studentene. F.eks. Kontantrabatt ved betaling før 60 dager.
                        </div>
                    </div>



                </div>



                    <div class="postering list-group">
                        @foreach($bilagsmal->posteringsmaler as $posteringsmal)

                            <div class="row list-group-item">

                                <div class="col-md-4">
                                        Konto:
                                        {!! $posteringsmal->konto->kontokode !!}
                                </div>

                                <div class="col-md-3">
                                        &fnof;(x) =
                                        {!!  $posteringsmal->formel !!}


                                </div>
                                <div class="col-md-2">
                                        A =
                                        {!! $posteringsmal->formel !!}

                                </div>
                                <div class="col-md-2">

                                       B =
                                        {!!  $posteringsmal->formel !!}



                                </div>


                            </div>

                        @endforeach

                    </div>


            </div>

        @endforeach


@section('scripts')



    <script src="/js/ajaxformsubmit.js"></script>

@endsection

@endsection
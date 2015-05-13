@extends('pur')
@section('content')
    @include('purmoduler.regnskap.bilagsmalsekvenser._editSubmenu')

    <div class="container content">

        <h1>Rediger oppgave</h1>
        {!! Form::model($bilagsmalsekvens, ['route' => ['bilagsmalsekvenser.update', $bilagsmalsekvens->id], 'method' => 'PATCH']) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-8">
                        <p>Sist endret: {{ $bilagsmalsekvens->tidEndret() }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-8">
                        <div class="input-group">
                            <div class="input-group-addon">Beskrivelse</div>
                            {!! Form::text('beskrivelse', $bilagsmalsekvens->oppgave->beskrivelse, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-user"></span> Motpart</div>
                            {!! Form::input('text', 'motpart', null, ['class' => 'form-control', 'id' => 'motpart']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {!! Form::close() !!}


            <h2>Variabler</h2>

            <blockquote class="bq-info">
                <p>Legg til variabler som skal brukes i bilagssekvens.</p>

                <p>Elevoppgavene får tilfeldige variabelverdier mellom minimumsverdi og maksimumsverdi.</p>
            </blockquote>

            <div class="row">
                <div class="col-sm-4">
                    <b>Variabelnavn:</b>
                </div>
                <div class="col-sm-4">
                    <b>Minimumsverdi:</b>
                </div>
                <div class="col-sm-4">
                    <b>Maksimumsverdi:</b>
                </div>
            </div>

            @foreach($bilagsmalsekvens->variabler as $variabel)
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="visible-xs-inline">Variabelnavn: </label>

                        <div class="input-group">
                            <div class="input-group-addon">{{$variabel->tegn_i_formel}}:</div>
                            {!! Form::input('text', $variabel->tegn_i_formel . 'navn', $variabel->navn, ['class' => 'form-control variabel', 'id' => $variabel->tegn_i_formel . 'Navn']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="visible-xs-inline">Minimumsverdi: </label>
                        {!! Form::input('number', $variabel->tegn_i_formel . 'Min', $variabel->verdi_min, ['min'=>'0', 'class' => 'form-control variabel', 'id' => $variabel->tegn_i_formel . 'Min']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="visible-xs-inline">Maksimumsverdi: </label>
                        {!! Form::input('number', $variabel->tegn_i_formel . 'Maks', $variabel->verdi_maks, ['min'=>'0', 'class' => 'form-control variabel', 'id' => $variabel->tegn_i_formel . 'Maks']) !!}
                    </div>

                </div>
            @endforeach

            <hr/>

        <div id="bilagsmaler">
            <h2>Bilag</h2>

            <p class="lead"></p>
            <blockquote class="bq-info">
                <p>Legg til bilag som skal vises i bilagssekvens.</p>

                <p>Klikk på vis bilag fanen for å se resultat av utregning.</p>
            </blockquote>
            @foreach($bilagsmalsekvens->bilagsmaler as $bilagsmal)
<section>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bilag nr. {{ $bilagsmal->nr_i_sekvens }}  - <span id="bilagstittel{{ $bilagsmal->id }}HeadingVis">{{ $bilagsmal->bilagstype }}</span></h3>

                        <div class="panel-action-bar pull-right">
                            <a data-toggle="collapse" href="#bilag{{ $bilagsmal->id }}"><span class="fa fa-compress"></span></a>
                            <a><span class="fa fa-close slett-bilag"></span></a>
                        </div>
                    </div>

                    <div id="bilag{{ $bilagsmal->id }}" class="bilag panel-collapse collapse in">
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 id="oh-snap!-you-got-an-error!">Slett bilag<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a>
                            </h4>

                            <p>Er du sikker på at du vil slette {{ $bilagsmal->tittel() }}?</p>

                            <p>
                                <button type="button" class="btn btn-danger bekreft-slett-bilag">
                                    <span class="fa fa-trash"></span> Slett
                                </button>
                                <button type="button" data-dismiss="alert" class="btn btn-default">Avbryt</button>
                            </p>
                        </div>
                        <div role="tabpanel">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#lagBilag{{ $bilagsmal->id }}" aria-controls="lagBilag" role="tab" data-toggle="tab">Lag bilagsmal</a>
                                </li>
                                <li role="presentation">
                                    <a href="#visBilag{{ $bilagsmal->id }}" aria-controls="visBilag" role="tab" data-toggle="tab">Vis generert eksempelbilag</a>
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
</section>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')




    <script src="{{ env('APPWEBPATH') }}/js/bilagsmalsekvens.js"></script>


    <script src="{{ env('APPWEBPATH') }}/js/ajaxformsubmit.js"></script>



@endsection
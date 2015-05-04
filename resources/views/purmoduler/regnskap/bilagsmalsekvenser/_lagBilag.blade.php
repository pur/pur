<div role="tabpanel" class="tab-pane active" id="lagBilag{{ $bilagsmal->id }}">
    <div class="panel-body">


        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">Tittel:</div>
                    {!! Form::text('bilagstittel', $bilagsmal->tittel(), ['class' => 'form-control bilagstittel', 'id' => 'bilagstittel' . $bilagsmal->id]) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Infotekst:</div>
                        {!! Form::textarea( 'infotekst', $bilagsmal->infotekst, ['id' => 'bilagstekst' . $bilagsmal->id, 'class' => 'form-control localstorage', 'style' => 'height: 4em;']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <blockquote class="bq-info">
                    <p>Velg hvilke elementer som skal vises sammen med oppgavetekst</p>
                </blockquote>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('false', 'motpartEksempel' . $bilagsmal->id) !!}
                        Motpart:
                        <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
                    </label>
                </div>
                @foreach($bilagsmalsekvens->variabler as $variabel)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('false', $variabel->tegn_i_formel . 'Eksempel' . $bilagsmal->id) !!} {{$variabel->tegn_i_formel}}:
                            <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}</span>
                            <span class="{{$variabel->tegn_i_formel}}Eksempel">{{($variabel->verdi_min +$variabel->verdi_min)/2}}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
</div>
</div>


        {!! Form::close() !!}
        <hr/>
        <blockquote class="bq-info">
            <p>Legg til posteringer</p>
        </blockquote>
        <div class="posteringer panel-default list-group">
            <div class="panel-heading hidden-xs">

                        <b>Posteringer:</b>

            </div>

            <div id="posteringsmaler-{{ $bilagsmal->id }}">
                @foreach($bilagsmal->posteringsmaler as $posteringsmal)

                    @include('purmoduler.regnskap.bilagsmalsekvenser._posteringsmal', ['posteringsmal' => $posteringsmal, 'cssclass' => ''])

                @endforeach
            </div>

            <div id="tomposteringsmal-{{ $bilagsmal->id }}">
                @include('purmoduler.regnskap.bilagsmalsekvenser._posteringsmal', ['posteringsmal' => null, 'cssclass' => 'hidden'])
            </div>

            <div class="list-group-item list-group-item-info ">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right">
                            {!! Form::open(['route' => ['posteringsmaler.store'], 'leggtil-asynk' => 'true']) !!}
                            {!! Form::hidden('bilagsmalId', $bilagsmal->id) !!}
                            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til postering">
                                <span class="fa fa-plus"></span>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
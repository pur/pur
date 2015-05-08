<div role="tabpanel" class="tab-pane active" id="lagBilag{{ $bilagsmal->id }}">
    <div class="panel-body">


        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}

        <div class="row">
            <div class="col-md-8">
                <blockquote class="bq-info">
                    <p>1. Fyll ut info om bilag</p>
                </blockquote>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="bilagstittel">Type:</label>
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('bilagstittel', $bilagsmal->bilagstype, ['class' => 'form-control bilagstittel', 'id' => 'bilagstittel' . $bilagsmal->id]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <label class="col-md-2" for="infotekst">Infotekst:</label>

                            <div class="col-md-10">
                                {!! Form::textarea( 'infotekst', $bilagsmal->infotekst, ['id' => 'bilagstekst' . $bilagsmal->id, 'class' => 'form-control bilagstekst animated', 'style' => 'height: 6em;']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <blockquote class="bq-info">
                    <p>2. Velg hvilke elementer som skal vises sammen med oppgavetekst</p>
                </blockquote>
                <div class="row">
                    <div class="col-md-12">
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
            <p>3. Legg til posteringer</p>
        </blockquote>
        <div class="posteringer">


            <div id="posteringsmaler-{{ $bilagsmal->id }}">
                @foreach($bilagsmal->posteringsmaler as $posteringsmal)

                    @include('purmoduler.regnskap.bilagsmalsekvenser._posteringsmal', ['posteringsmal' => $posteringsmal, 'cssclass' => ''])

                @endforeach
            </div>

            <div id="tomposteringsmal-{{ $bilagsmal->id }}">
                @include('purmoduler.regnskap.bilagsmalsekvenser._posteringsmal', ['posteringsmal' => null, 'cssclass' => 'hidden'])
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                        {!! Form::open(['route' => ['posteringsmaler.store'], 'opprett-mal-asynk' => 'true']) !!}
                        {!! Form::hidden('bilagsmalId', $bilagsmal->id) !!}
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til postering">
                            <span class="fa fa-plus"></span>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
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
                      {{--  <div class="radio">
                            <label class="radio">
                                {!! Form::radio('false', 'motpartEksempel' . $bilagsmal->id) !!}
                                Motpart:
                                <div class="radio-inline motpartEksempel">{{$bilagsmalsekvens->motpart}}</div>
                            </label>
                        </div>
                        --}}
                        {{--  @foreach($bilagsmalsekvens->variabler as $variabel)
                              <div class="radio">
                                  <label class="radio">
                                      {!! Form::radio('false', $variabel->tegn_i_formel . 'Eksempel' . $bilagsmal->id) !!} {{$variabel->tegn_i_formel}}:
                                      <div class="radio-inline {{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}</div>
                                      <div class="radio-inline {{$variabel->tegn_i_formel}}Eksempel">{{($variabel->verdi_min +$variabel->verdi_min)/2}}</div>
                                  </label>
                              </div>
                          @endforeach--}}

                        <div class="radio">
                            <label class="radio">
                                @if($bilagsmal->belopsformel == 8)
                                    {!! Form::radio('formel-a', '8', 'checked') !!}
                                @else
                                    {!! Form::radio('formel-a', '8') !!}
                                @endif
                                <div class="radio-inline aNavnEksempel">a</div>
                                <div class="radio-inline aEksempel"></div>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio">
                                @if($bilagsmal->belopsformel == 9)
                                    {!! Form::radio('formel-a', '9', 'checked') !!}
                                @else
                                    {!! Form::radio('formel-a', '9') !!}
                                @endif
                                <div class="radio-inline bNavnEksempel">b</div>
                                <div class="radio-inline bEksempel"></div>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio">
                                @if($bilagsmal->belopsformel == 10)
                                    {!! Form::radio('formel-a', '10', 'checked') !!}
                                @else
                                    {!! Form::radio('formel-a', '10') !!}
                                @endif
                                <div class="radio-inline a-bNavnEksempel">a-b</div>
                                <div class="radio-inline a-bEksempel"></div>
                            </label>
                        </div>



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
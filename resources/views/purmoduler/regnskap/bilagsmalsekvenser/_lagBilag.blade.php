<div role="tabpanel" class="tab-pane active" id="lagBilag{{ $bilagsmal->id }}">
    <div class="panel-body">
        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
        <blockquote class="bq-info">
            <p>Fyll ut info om bilag</p>
        </blockquote>
        <div class="row">
            <div class="col-md-6">
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Formel for bilagets beløp: </label>
                        <div class="radio">
                            <label class="radio">
                                @if($bilagsmal->belopsformel == 1)
                                    {!! Form::radio('belopsformel', '1', 'true', ['id' => 'formel1']) !!}
                                @else
                                    {!! Form::radio('belopsformel', '1', 'false', ['id' => 'formel1']) !!}
                                @endif
                                <div class="radio-bilagsformel">
                                    <b>a: </b>

                                    <span class="aNavnEksempel"></span>
                                </div>
                            </label>
                            </div>

                        <div class="radio">
                            <label class="radio">
                                @if($bilagsmal->belopsformel == 4)
                                    {!! Form::radio('belopsformel', '4', 'true', ['id' => 'formel4']) !!}
                                @else
                                    {!! Form::radio('belopsformel', '4', 'true', ['id' => 'formel4']) !!}
                                @endif
                                <div class="radio-bilagsformel">
                                    <b>b: </b>
                                    <span class="bNavnEksempel"></span>

                                </div>
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio">
                                @if($bilagsmal->belopsformel == 13)
                                    {!! Form::radio('belopsformel', '13', 'true', ['id' => 'formel13']) !!}
                                @else
                                    {!! Form::radio('belopsformel', '13', 'false',  ['id' => 'formel13']) !!}
                                @endif
                                <div class="radio-bilagsformel">
                                    <b>a - b: </b>

                                    <span class="aNavnEksempel"></span> -
                                    <span class="bNavnEksempel"></span>

                                </div>
                            </label>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <label class="col-md-2" for="infotekst">Infotekst:</label>

                            <div class="col-md-10">
                                {!! Form::textarea( 'infotekst', $bilagsmal->infotekst, ['id' => 'bilagstekst' . $bilagsmal->id, 'class' => 'form-control bilagstekst animated', 'style' => 'height: 6em']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        {!! Form::close() !!}
        <hr/>
        <blockquote class="bq-info">
            <p>Legg til posteringer</p>
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
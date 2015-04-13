<div role="tabpanel" class="tab-pane active" id="lagBilag{{ $bilagsmal->id }}">
    <div class="panel-body">


        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
        <div class="row">
            <div class="form-group col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">Tittel:</div>
                    {!! Form::text('bilagstittel', $bilagsmal->tittel(), ['class' => 'form-control bilagstittel', 'id' => 'bilagstittel' . $bilagsmal->id]) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="lead">Felter som skal vises:</p>

                <div class="checkbox-inline">
                    {!! Form::checkbox('false', 'motpartEksempel' . $bilagsmal->id) !!} Motpart:
                    <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
                </div>
                @foreach($bilagsmalsekvens->variabler as $variabel)
                    <div class="checkbox-inline">
                        {!! Form::checkbox('false', $variabel->tegn_i_formel . 'Eksempel' . $bilagsmal->id) !!}
                        {{$variabel->tegn_i_formel}}:
                        <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}:</span>
                        <span class="{{$variabel->tegn_i_formel}}Eksempel">{{($variabel->verdi_min +$variabel->verdi_min)/2}}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <p class="lead">Bilagstekst:</p>

                    {!! Form::textarea( 'bilagstekst', 'Kontantrabatt ved betaling før 60 dager.', ['id' => 'bilagstekst' . $bilagsmal->id, 'class' => 'form-control localstorage', 'style' => 'height: 75px;']) !!}
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
    <div class="postering list-group">
        @foreach($bilagsmal->posteringsmaler as $posteringsmal)
            {!! Form::model($posteringsmal, ['route' => ['posteringsmaler.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
            <div class="row list-group-item">
                <div class="col-md-11">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="input-group pur-dropdown">
                                <div class="input-group-addon">Konto:</div>
                                {!!Form::select('kontokode', $selectKontoer, $posteringsmal->konto->kontokode, ['class' => 'form-control kontoliste', 'id' => 'kontokode-' . $posteringsmal->id]) !!}
                                <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group pur-dropdown">
                                <div class="input-group-addon">Beløp =</div>
                                {!! Form::select('formel', $selectFormler, $posteringsmal->formel, ['id' => 'formel-' . $posteringsmal->id, 'class' => 'form-control formelliste']) !!}
                                <div class="input-group-addon">
                                    <span class="fa fa-caret-down"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-1">
                    <div class="btn-group pull-right">
                        <a class="btn btn-default slett-postering" data-toggle="tooltip" data-placement="top" data-container="body" title="Slett postering">
                            <span class="fa fa-trash-o"></span>
                        </a>
                    </div>
                    {{-- TODO Slett postering i DB --}}
                </div>
            </div>
            {!! Form::close() !!}
        @endforeach
            <div class="list-group-item list-group-item-info ">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right">
                            <a class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til postering">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
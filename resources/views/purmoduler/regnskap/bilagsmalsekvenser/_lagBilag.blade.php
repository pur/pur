<div role="tabpanel" class="tab-pane active" id="lagBilag{{ $bilagsmal->id }}">
    <div class="panel-body">
        {!! Form::model($bilagsmal, ['route' => ['bilagsmaler.update', $bilagsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
        <div class="row">
            <div class="form-group col-sm-4">
                {!! Form::checkbox('false', 'motpartEksempel' . $bilagsmal->id) !!} Motpart:
                <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
            </div>
            @foreach($bilagsmalsekvens->variabler as $variabel)
                <div class="form-group col-sm-4">
                    {!! Form::checkbox('false', $variabel->tegn_i_formel . 'Eksempel' . $bilagsmal->id) !!}
                    {{$variabel->tegn_i_formel}}:
                    <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}:</span>
                    <span class="{{$variabel->tegn_i_formel}}Eksempel">{{($variabel->verdi_min +$variabel->verdi_min)/2}}</span>
                </div>
            @endforeach
            <div class="form-group col-sm-12">
                {!! Form::label('bilagstekst', 'Bilagstekst:') !!}
                {!! Form::textarea( 'bilagstekst', 'Kontantrabatt ved betaling før 60 dager.', ['id' => 'bilagstekst' . $bilagsmal->id, 'class' => 'form-control localstorage', 'style' => 'height: 75px;']) !!}
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
                    <p><a class="slett-postering"><span class="fa fa-trash-o fa-2x"></span></a>
                    </p>
                    {{-- TODO Slett postering i DB --}}
                </div>
            </div>

            {!! Form::close() !!}
        @endforeach
        <a class="ny-postering row list-group-item list-group-item-info text-center">
            <span class="fa fa-plus"></span> Legg til postering
        </a>
    </div>
</div>
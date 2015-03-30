<div role="tabpanel" class="tab-pane" id="visBilag{{ $bilagsmal->id }}">
    <div class="panel-body">

        <p id="bilagstekst{{ $bilagsmal->id }}Vis">{{ $bilagsmal->bilagstekst }}</p>

        <div id="motpartEksempel{{$bilagsmal->id}}" style="display: none;">
            Motpart:
            <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
        </div>

        @foreach($bilagsmalsekvens->variabler as $variabel)
            <div id="{{$variabel->tegn_i_formel}}Eksempel{{$bilagsmal->id}}" class="" style="display: none;">
                {{$variabel->tegn_i_formel}}:
                <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}:</span>
                <span class="{{$variabel->tegn_i_formel}}Eksempel">{{(($variabel->verdi_maks) + ($variabel->verdi_min))/2}}</span>
            </div>
        @endforeach


        <dl class="dl-horizontal">
                        <span id="aVis{{ $bilagsmal->id }}" style="display: none;">
                            <dt>A =</dt><dd>
                                <span class="aEksempel"></span>,- (<span class="aNavnEksempel"></span>)
                            </dd>
                        </span>
                        <span id="bVis{{ $bilagsmal->id }}" style="display: none;">
                            <dt>B =</dt><dd>
                                <span class="bEksempel"></span>,- (<span class="bNavnEksempel"></span>)
                            </dd>

                        </span>
                        <span id="xVis{{ $bilagsmal->id }}" style="display: none;">
                            <dt>X =</dt><dd>
                                <span class="xEksempel"></span>% (<span class="xNavnEksempel"></span>)
                            </dd>
                        </span>
                        <span id="yVis{{ $bilagsmal->id }}" style="display: none;">
                            <dt>Y =</dt><dd>
                                <span class="yEksempel"></span>% (<span class="yNavnEksempel"></span>)
                            </dd>
                        </span>
                        <span id="motpartVis{{ $bilagsmal->id }}" style="display: none;">
                            <dt>Motpart:</dt><dd><span class="motpartEksempel"></span></dd>
                        </span>
        </dl>

    </div>

    <div class="postering list-group">
        @foreach($bilagsmal->posteringsmaler as $posteringsmal)
            {!! Form::model($posteringsmal, ['route' => ['posteringsmal.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
            <div class="row list-group-item">
                <div class="col-md-11">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <span id="kontokode-{{ $posteringsmal->id }}Vis">{{$posteringsmal->konto->kontokode}} </span>
                        </div>
                        <div class="form-group col-md-5">
                            <span id="formel-{{ $posteringsmal->id }}Vis">{{ $posteringsmal->formel }}</span>

                        </div>
                        <div class="form-group col-md-2">
                            <span class="bilag{{ $bilagsmal->id }}-formel" id="formel-{{ $posteringsmal->id }}ResultatVis"></span>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-1">

                </div>
            </div>

            {!! Form::close() !!}
        @endforeach
        <div class="row list-group-item">
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group col-md-5">
                        <span>Resultat:</span>
                    </div>
                    <div class="form-group col-md-5">
                        <span></span>

                    </div>
                    <div class="form-group col-md-2">
                        <span id="bilag{{ $bilagsmal->id }}Resultat"></span>

                    </div>
                </div>
            </div>
            <div class="form-group col-md-1">

            </div>
        </div>
    </div>
</div>
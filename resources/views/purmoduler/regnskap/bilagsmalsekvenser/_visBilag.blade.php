<div role="tabpanel" class="tab-pane" id="visBilag{{ $bilagsmal->id }}">
    <div class="panel-body">

       <!-- <p class="lead">Bilag nr. {{ $bilagsmal->nr_i_sekvens}} - <span id="bilagstittel{{ $bilagsmal->id }}Vis">{{ $bilagsmal->bilagstype}}</span></p> -->

         <p id="motpartVis{{ $bilagsmal->id }}" class="lead">
                <span class="motpartEksempel"></span>
            </p>

        <p id="bruttobelopVis{{ $bilagsmal->id }}">
                Beløp: <span class="bruttobelopEksempel"></span>
            </p>

        <p id="bilagstekst{{ $bilagsmal->id }}Vis">{{ $bilagsmal->infotekst }}</p>

        <div id="motpartEksempel{{$bilagsmal->id}}" style="display: none;">
            Motpart:
            <span class="motpartEksempel">{{$bilagsmalsekvens->motpart}}</span>
        </div>

        <!--
        @foreach($bilagsmalsekvens->variabler as $variabel)
            <div id="{{$variabel->tegn_i_formel}}Eksempel{{$bilagsmal->id}}" class="" style="display: none;">
                {{$variabel->tegn_i_formel}}:
                <span class="{{$variabel->tegn_i_formel}}NavnEksempel">{{$variabel->navn}}:</span>
                <span class="{{$variabel->tegn_i_formel}}Eksempel">{{(($variabel->verdi_maks) + ($variabel->verdi_min))/2}}</span>
            </div>
        @endforeach -->




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
        </dl>
        <div class="list-group">
            <div class="visPosteringer" >


            @foreach($bilagsmal->posteringsmaler as $posteringsmal)
                @include('purmoduler.regnskap.bilagsmalsekvenser._visPosteringsmal', ['posteringsmal' => $posteringsmal, 'cssclass' => ''])
                @endforeach
            <div id="tomposteringsmal-{{ $bilagsmal->id }}Vis">
                @include('purmoduler.regnskap.bilagsmalsekvenser._visPosteringsmal', ['posteringsmal' => null, 'cssclass' => 'hidden'])
            </div>
            </div>


                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <span>Resultat:</span>
                                </div>
                                <div class="form-group col-md-5">
                                    <span></span>
                                </div>
                                <div class="form-group col-md-2 posteringVis">
                                    <span id="bilag{{ $bilagsmal->id }}Resultat"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
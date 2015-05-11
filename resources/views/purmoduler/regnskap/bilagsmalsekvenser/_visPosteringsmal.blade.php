@if ($posteringsmal != null)
    <div class="list-group-item {{$cssclass}}" id="posteringsmal-{{ $posteringsmal->id }}Vis">
        <div class="row">
            <div class="col-md-11">
                <div class="row posteringVis">
                    <div class="form-group col-md-6">

                        <span>Konto: </span><span id="kontokode-{{$posteringsmal->id}}Vis">{{$posteringsmal->konto->kontokode}} </span>
                    </div>
                    <div class="form-group col-md-4">
                        <span>Formel: </span><span id="formel-{{$posteringsmal->id}}Vis">{{ $posteringsmal->formel }}</span>
                    </div>
                    <div class="form-group col-md-2">
                        <span>Beløp = </span><span class="bilag{{ $bilagsmal->id }}-formel" id="formel-{{ $posteringsmal->id }}ResultatVis"></span>
                    </div>
                </div>

            </div>
            <div class="form-group col-md-1">
            </div>
        </div>
    </div>
@else
    <div class="list-group-item {{$cssclass}}">
        <div class="row">
            <div class="col-md-11">
                <div class="row posteringVis">
                    <div class="form-group col-md-6">
                        <span>Konto: </span><span class="kontokodeVis" id=""></span>
                    </div>
                    <div class="form-group col-md-4">
                        <span>Formel: </span><span class="formelVis" id=""></span>
                    </div>
                    <div class="form-group col-md-2">
                        <span>Beløp = </span><span class="belopVis" id=""></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-1">
            </div>
        </div>
    </div>
@endif





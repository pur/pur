<div class="list-group-item {{$cssclass}}">
    <div class="row">
        <div class="col-md-11">
            <div class="row posteringVis">
                @if ($posteringsmal != null)
                    <div class="form-group col-md-7">
                        <span id="kontokode-{{$posteringsmal->id}}Vis">{{$posteringsmal->konto->kontokode}} </span>
                    </div>
                    <div class="form-group col-md-3">
                        <span id="formel-{{$posteringsmal->id}}Vis">{{ $posteringsmal->formel }}</span>
                    </div>
                    <div class="form-group col-md-2">
                        <span class="bilag{{ $bilagsmal->id }}-formel" id="formel-{{ $posteringsmal->id }}ResultatVis"></span>
                    </div>
                @else
                    <div class="form-group col-md-7">
                        <span class="kontokodeVis" id=""></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="formelVis" id=""></span>
                    </div>
                    <div class="form-group col-md-2">
                        <span class="belopVis" id=""></span>
                    </div>
                @endif

            </div>

        </div>
        <div class="form-group col-md-1">

        </div>
    </div>
</div>



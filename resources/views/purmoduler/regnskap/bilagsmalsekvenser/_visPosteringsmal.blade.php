{!! Form::model($posteringsmal, ['route' => ['posteringsmaler.update', $posteringsmal->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
<div class="list-group-item">
    <div class="row">
        <div class="col-md-11">
            <div class="row">
                <div class="form-group col-md-7">
                    <span id="kontokode-{{ $posteringsmal->id }}Vis">{{$posteringsmal->konto->kontokode}} </span>
                </div>
                <div class="form-group col-md-3">
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
</div>


{!! Form::close() !!}
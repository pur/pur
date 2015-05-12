<div class="postering {{ $cssclass }} ">
    <div class="row">
        <div class="col-md-11">
            @if($posteringsmal != null)
                {!! Form::model($posteringsmal, ['route' => ['posteringsmaler.update', $posteringsmal->id], 'method' => 'PATCH', 'oppdater-asynk' => 'on-form-focusout']) !!}
            @else
                {!! Form::open(['route' => ['posteringsmaler.update', null], 'method' => 'PATCH', 'oppdater-asynk' => 'on-form-focusout']) !!}
            @endif
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="input-group pur-dropdown">
                        <div class="input-group-addon">Konto:</div>
                        {!! Form::select('kontokode', $selectKontoer, $posteringsmal != null ? $posteringsmal->konto->kontokode : 0, ['id' =>  ($posteringsmal != null) ? 'kontokode-' . $posteringsmal->id : '', 'class' => 'form-control kontoliste', 'autocomplete' => 'off']) !!}

                        <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="input-group pur-dropdown">
                        <div class="input-group-addon">Beløp =</div>
                        {!! Form::select('formel', $selectFormler,  $posteringsmal != null ? $posteringsmal->formel : null, ['id' =>  ($posteringsmal != null) ? 'formel-' . $posteringsmal->id : '', 'class' => 'form-control formelliste', 'autocomplete' => 'off']) !!}
                        <div class="input-group-addon">
                            <span class="fa fa-caret-down"></span>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="form-group col-md-1 action-buttons">
            <div class="pull-right">
                @if($posteringsmal != null)
                    {!! Form::open(['route' => ['posteringsmaler.destroy', $posteringsmal->id], 'method' => 'DELETE', 'slett-asynk' => 'true' ]) !!}
                    <button type="submit" class="btn btn-default" id="posteringsmal-{{$posteringsmal->id}}" data-toggle="tooltip" data-placement="top"
                            data-container="body" title="Slett postering">
                        <span class="fa fa-minus"></span>
                    </button>
                @else
                    {!! Form::open(['route' => ['posteringsmaler.destroy', null], 'method' => 'DELETE', 'slett-asynk' => 'true']) !!}
                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                            data-container="body" title="Slett postering">
                        <span class="fa fa-minus"></span>
                    </button>
                @endif

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
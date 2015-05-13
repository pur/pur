<div class=" postering list-group-item {{ $cssclass }} ">
    <div class="row">
        <div class="col-md-10">
            @if($postering != null)
            {!! Form::model($postering, ['route' => ['posteringer.update', $postering->id], 'method' => 'PATCH', 'oppdater-asynk' => 'true', 'id' => 'posteringsform-' . $postering->id]) !!}
            @else
            {!! Form::open(['route' => ['posteringer.update', null], 'method' => 'PATCH', 'oppdater-asynk' => 'true']) !!}
            @endif
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="input-group pur-dropdown">
                        <div class="input-group-addon">Konto:</div>
                        {!! Form::select('kontokode', $selectKontoer, $postering != null ? $postering->konto->kontokode : 0, ['id' =>  $postering != null ? 'kontokode-' . $postering->id : '', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <div class="input-group-addon">Beløp =</div>
                        {!! Form::input('text', 'belop', $postering != null ? $postering->belop() : 0.00, ['id' => $postering != null ? 'belop-' . $postering->id : '', 'class' => 'form-control bilag' . $bilag->id. '-belop', 'autocomplete' => 'off']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-2">
            <div class="pull-right">

                <button posterings-id="{{ $postering != null ? $postering->id : null }}" class="btn btn-default oppdater-knapp" data-toggle="tooltip" data-placement="top" data-container="body" title="Postér">
                    <span class="fa fa-check"></span>
                </button>

                @if($postering != null)
                    {!! Form::open(['route' => ['posteringer.destroy', $postering->id], 'method' => 'DELETE', 'slett-asynk' => 'true', 'class' => 'form-inline bekreft-slett']) !!}
                @else
                    {!! Form::open(['route' => ['posteringer.destroy', null], 'method' => 'DELETE', 'slett-asynk' => 'true', 'class' => 'form-inline bekreft-slett']) !!}
                @endif
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                        data-container="body" title="Slett postering">
                    <span class="fa fa-trash"></span>
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
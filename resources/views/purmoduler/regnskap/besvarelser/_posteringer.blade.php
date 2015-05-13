<div class="posteringer list-group">

    <div id="posteringer-{{ $bilag->id }}">
        @foreach($bilag->elevposteringer as $postering)

            @include('purmoduler.regnskap.besvarelser._postering', ['postering' => $postering, 'cssclass' => $postering->erKorrekt() ? 'korrekt' : ''])

        @endforeach
    </div>

    <div id="tompostering-{{ $bilag->id }}">
        @include('purmoduler.regnskap.besvarelser._postering', ['postering' => null, 'cssclass' => 'hidden'])
    </div>

    <div class="list-group-item list-group-item-info ">
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! Form::open(['route' => ['posteringer.store'], 'opprett-asynk' => 'true']) !!}
                    {!! Form::hidden('bilagsId', $bilag->id) !!}
                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til postering">
                        <span class="fa fa-plus"></span>
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="list-group-item ">
        <div class="row posteringVis">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-5">

                    </div>
                    <div class="form-group col-md-5">
                        <div class="pull-right">

                        <span>Kontrollsum: </span><span id="bilag{{$bilag->id}}-kontrollsum"></span>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-sm-1">

            </div>
        </div>
    </div>
</div>



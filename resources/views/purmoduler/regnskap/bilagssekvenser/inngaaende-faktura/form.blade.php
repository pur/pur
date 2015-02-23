<h2>Inngående faktura</h2>
<div class="row">
    <div class="form-group col-sm-12">
        {!!Form::label('beskrivelse', 'Beskrivelse:') !!}
        {!! Form::text('beskrivelse', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#inngaaendefaktura" aria-controls="inngaaendefaktura" role="tab"
                                                  data-toggle="tab">Inngående faktura</a></li>
        <li role="presentation"><a href="#inngaaendekreditnota" aria-controls="inngaaendekreditnota" role="tab"
                                   data-toggle="tab">Inngående kreditnota</a></li>
        <li role="presentation"><a href="#utbetaling" aria-controls="utbetaling" role="tab"
                                   data-toggle="tab">Utbetaling</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="inngaaendefaktura">
            <div class="panel">

                <div class="panel panel-body">


                    <div class="row">
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-min', 'Minimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-maks', 'Maksimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-maks', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            {!!Form::label('rabattsats', 'Rabattsats:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                {!! Form::text('rabattsats', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                    <div id="inngaende-faktura-post" class="list-group">
                        <div class="row list-group-item">

                            <div class="col-md-5"><h4>Postering 1</h4></div>
                            <div class="form-group col-md-3">
                                {!!Form::select('konto', array('2343' => '2343 Konto 1', '4324' => '4324 Konto 2', '1284' => '1284 Konto 3'), null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-3">
                                {!!Form::select('konto', array('formel1' => 'Formel 1', 'formel2' => 'Formel 2', 'formel3' => 'Formel 3'), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-1">
                                <a class="btn btn-danger slett-inngaende-faktura-post">Slett</a>
                            </div>
                        </div>

                        <a id="ny-inngaende-faktura-post"
                           class="row list-group-item list-group-item-success text-center">

                            Legg til ny postering

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="inngaaendekreditnota">
            <div class="panel">

                <div class="panel panel-body">


                    <div class="row">
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-min', 'Minimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-maks', 'Maksimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-maks', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            {!!Form::label('rabattsats', 'Rabattsats:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                {!! Form::text('rabattsats', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                    <div id="inngaende-kreditnota-post" class="list-group">
                        <div class="row list-group-item">

                            <div class="col-md-5"><h4>Postering 1</h4></div>
                            <div class="form-group col-md-3">
                                {!!Form::select('konto', array('2343' => '2343 Konto 1', '4324' => '4324 Konto 2', '1284' => '1284 Konto 3'), null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-3">
                                {!!Form::select('konto', array('formel1' => 'Formel 1', 'formel2' => 'Formel 2', 'formel3' => 'Formel 3'), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-1">
                                <a class="btn btn-danger slett-inngaende-kreditnnota-post">Slett</a>
                            </div>
                        </div>

                        <a id="ny-inngaende-kreditnota-post"
                           class="row list-group-item list-group-item-success text-center">

                            Legg til ny postering

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="utbetaling">
            <div class="panel">

                <div class="panel panel-body">


                    <div class="row">
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-min', 'Minimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            {!!Form::label('bruttobelop-maks', 'Maksimum bruttobeløp:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                {!! Form::text('bruttobelop-maks', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            {!!Form::label('rabattsats', 'Rabattsats:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                {!! Form::text('rabattsats', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                    <div id="utbetaling-post" class="list-group">
                        <div class="row list-group-item">

                            <div class="col-md-5"><h4>Postering 1</h4></div>
                            <div class="form-group col-md-3">
                                {!!Form::select('konto', array('2343' => '2343 Konto 1', '4324' => '4324 Konto 2', '1284' => '1284 Konto 3'), null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-3">
                                {!!Form::select('konto', array('formel1' => 'Formel 1', 'formel2' => 'Formel 2', 'formel3' => 'Formel 3'), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-1">
                                <a class="btn btn-danger slett-utbetaling-post">Slett</a>
                            </div>
                        </div>

                        <a id="ny-utbetaling-post"
                           class="row list-group-item list-group-item-success text-center">

                            Legg til ny postering

                        </a>
                    </div>
                </div>
            </div>
            <!-- Slutt panel body -->

        </div>
        <!-- Slutt panel -->
    </div>
</div>

<div class="checkbox">
    <label>
        <input type="checkbox"> Del med andre faglærere
    </label>
</div>
<div class="btn-group">
    <button type="submit" class="btn btn-success">Opprett oppgave</button>
    <button type="reset" class="btn btn-danger">Avbryt</button>
</div>
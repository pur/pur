
<h2>Inngående faktura</h2>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">Inngående faktura</h3></div>

    <div class="panel panel-body">

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="bruttobelop-min">Beskrivelse</label>
                    <input id="beskrivelse" type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="bruttobelop-min">Minimum bruttobeløp</label>
                <div class="input-group">
                    <div class="input-group-addon">NOK</div>
                    <input id="bruttobelop-min" type="number" step="any" class="form-control">
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="bruttobelop-maks">Maksimum bruttobeløp</label>
                <div class="input-group">
                    <div class="input-group-addon">NOK</div>
                    <input id="bruttobelop-maks" type="number" step="any" class="form-control">
                </div>
            </div>

            <div class="form-group col-sm-4">
                <label for="rabattsats">Rabattsats</label>
                <div class="input-group">
                    <div class="input-group-addon">%</div>
                    <input id="rabattsats" type="number" step="any" class="form-control">
                </div>
            </div>

        </div>
        <div id="inngaende-faktura-post" class="list-group">
            <div class="row list-group-item">

                <div class="col-md-5"><h4>Postering 1</h4></div>
                <div class="form-group col-md-3">

                    <select class="form-control">
                        <option>2343 Konto 1</option>
                        <option>4324 Konto 2</option>
                        <option>1284 Konto 3</option>
                    </select>
                </div>

                <div class="form-group col-md-3">

                    <select class="form-control">
                        <option>Formel 1</option>
                        <option>Formel 2</option>
                        <option>Formel 3</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <a class="btn btn-danger slett-inngaende-faktura-post">Slett</a>
                </div>
            </div>


            <a id="ny-inngaende-faktura-post" class="row list-group-item list-group-item-success text-center">

                Legg til ny postering

            </a>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">Inngående kreditnota</h3></div>

    <div class="panel panel-body">


        <div class="row">
            <div class="form-group col-sm-4">
                <label for="bruttobelop-min">Minimum bruttobeløp</label>
                <div class="input-group">
                    <div class="input-group-addon">NOK</div>
                    <input id="bruttobelop-min" type="number" step="any" class="form-control">
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="bruttobelop-maks">Maksimum bruttobeløp</label>
                <div class="input-group">
                    <div class="input-group-addon">NOK</div>
                    <input id="bruttobelop-maks" type="number" step="any" class="form-control">
                </div>
            </div>

            <div class="form-group col-sm-4">
                <label for="rabattsats">Rabattsats</label>
                <div class="input-group">
                    <div class="input-group-addon">%</div>
                    <input id="rabattsats" type="number" step="any" class="form-control">
                </div>
            </div>

        </div>
        <div id="inngaende-kreditnota-post" class="list-group">
            <div class="row list-group-item">

                <div class="col-md-5"><h4>Postering 1</h4></div>
                <div class="form-group col-md-3">

                    <select class="form-control">
                        <option>2343 Konto 1</option>
                        <option>4324 Konto 2</option>
                        <option>1284 Konto 3</option>
                    </select>
                </div>

                <div class="form-group col-md-3">

                    <select class="form-control">
                        <option>Formel 1</option>
                        <option>Formel 2</option>
                        <option>Formel 3</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <a class="btn btn-danger slett-inngaende-kreditnota-post">Slett</a>
                </div>
            </div>


            <a id="ny-inngaende-kreditnota-post" class="row list-group-item list-group-item-success text-center">

                Legg til ny postering

            </a>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">Utbetaling</h3></div>

    <div class="panel panel-body">

        <div class="row">
            <div class="form-group col-sm-4">
                <label for="bruttobelop-min">Minimum bruttobeløp</label>
                <div class="input-group">
                    <div class="input-group-addon">NOK</div>
                    <input id="bruttobelop-min" type="number" step="any" class="form-control">
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="bruttobelop-maks">Maksimum bruttobeløp</label>
                <div class="input-group">
                    <div class="input-group-addon">NOK</div>
                    <input id="bruttobelop-maks" type="number" step="any" class="form-control">
                </div>
            </div>

            <div class="form-group col-sm-4">
                <label for="rabattsats">Rabattsats</label>
                <div class="input-group">
                    <div class="input-group-addon">%</div>
                    <input id="rabattsats" type="number" step="any" class="form-control">
                </div>
            </div>

        </div>
        <div id="utbetaling-post" class="list-group">
            <div class="row list-group-item">

                <div class="col-md-5"><h4>Postering 1</h4></div>
                <div class="form-group col-md-3">

                    <select class="form-control">
                        <option>2343 Konto 1</option>
                        <option>4324 Konto 2</option>
                        <option>1284 Konto 3</option>
                    </select>
                </div>

                <div class="form-group col-md-3">

                    <select class="form-control">
                        <option>Formel 1</option>
                        <option>Formel 2</option>
                        <option>Formel 3</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <a class="btn btn-danger slett-utbetaling-post">Slett</a>
                </div>
            </div>


            <a id="ny-utbetaling-post" class="row list-group-item list-group-item-success text-center">

                Legg til ny postering

            </a>
        </div>




    </div> <!-- Slutt panel body -->

</div> <!-- Slutt panel -->

<div class="checkbox">
    <label>
        <input type="checkbox"> Del med andre faglærere
    </label>
</div>
<div class="btn-group">
    <button type="submit" class="btn btn-success">Opprett oppgave</button>
    <button type="reset" class="btn btn-danger">Avbryt</button>
</div>
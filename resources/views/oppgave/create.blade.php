@extends('app')
@section('content')
    <div class="container">
        <h1>Opprett oppgave</h1>
        <form>
            <div class="form-group">
                <label for="tittel">Tittel</label>
                <input id="tittel" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="beskrivelse">Beskrivelse</label>
                <textarea id="beskrivelse" class="form-control"></textarea>
            </div>
            <h2>Bilagsmaler</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="bilagstype">Bilagstype</label>
                            <select class="form-control">
                                <option>Inngående faktura</option>
                                <option>Inngående kreditnota</option>
                                <option>Utbetaling</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dato">Dato</label>
                            <input type="date" id="dato" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="motpart">Motpart</label>
                            <input id="motpart" type="text" step="any" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rabattsats">Rabattsats</label>
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                <input id="rabattsats" type="number" step="any" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h3>Bruttobeløp</h3>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="bruttobelop-min">Min</label>
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                <input id="bruttobelop-min" type="number" step="any" class="form-control">
                            </div>
                            <label for="bruttobelop-maks">Maks</label>
                            <div class="input-group">
                                <div class="input-group-addon">NOK</div>
                                <input id="bruttobelop-maks" type="number" step="any" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Del med andre faglærere
                </label>
            </div>
            <button type="submit" class="btn btn-success">Legg til bilag</button>
            <button type="submit" class="btn btn-default">Lagre oppgave</button>
        </form>
    </div>


@endsection
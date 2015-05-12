<div class="list-group panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-2">
                <b>Kontokode:</b>
            </div>
            <div class="col-sm-3">
                <b>Konto:</b>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <b>Saldo:</b>
            </div>
        </div>
    </div>

    <!--TODO foreach -->
    @foreach($bilagssamling as $bilag)
        @foreach($bilag->elevposteringer as $postering)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-2">
                        {{ $postering->konto->kontokode}}
                    </div>
                    <div class="col-sm-3">
                        {{ $postering->konto->kontonavn}}
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        {{$postering->belop}}
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    <div class="list-group-item">
        <div class="row">
            <div class="col-sm-3">
                <b>Resultat:</b>
            </div>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">

            </div>
            <div id="saldobalanseResultat" class="col-sm-3">
                12500.00,-
            </div>
        </div>
    </div>

</div>
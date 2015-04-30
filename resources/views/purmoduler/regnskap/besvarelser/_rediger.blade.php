<div role="tabpanel">
    <nav>
        <ul class="pagination" role="tablist">
            @foreach($bilagssamling as $bilag)
                <li class="@if($bilag->id == 1) active @endif">
                    <a href="#bilag{{ $bilag->id }}" aria-controls="bilag{{ $bilag->id }}" role="tab" data-toggle="tab">
                        {{ $bilag->id }} <span class="sr-only">(current)</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div class="tab-content">

        @foreach($bilagssamling as $bilag)
            <div id="bilag{{ $bilag->id }}" class="tab-pane panel panel-primary @if($bilag->id == 1) active @endif" role="tabpanel">
                <div class="panel-heading">
                    <h3 id="bilagstittel{{ $bilag->id }}HeadingVis" class="panel-title">Bilag {{ $bilag->id }} - {{ $bilag->bilagsmal->bilagstype}}</h3>
                </div>
                <div class="panel-body">
                    {{ $bilag->bilagsmal->infotekst}}
                </div>
                @include('purmoduler.regnskap.besvarelser._besvarelsePostering')


            </div>
        @endforeach
        <div class="postering list-group">
            <div class="list-group-item ">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>

                                </p>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"> Kontrollsum:</div>

                                    <input class="form-control" readonly value="234.54,-">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-1">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
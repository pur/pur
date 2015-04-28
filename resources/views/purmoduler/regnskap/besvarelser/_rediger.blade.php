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
            <div id="bilag{{ $bilag->id }}" class="tab-pane panel-collapse in panel panel-primary @if($bilag->id == 1) active @endif" role="tabpanel">
                <div class="panel-heading">
                    <h3 id="bilagstittel{{ $bilag->id }}HeadingVis" class="panel-title">Bilag {{ $bilag->id }}</h3>

                    <div class="panel-action-bar pull-right">
                        <a data-toggle="collapse" href="#bilag{{ $bilag->id }}"><span class="fa fa-compress"></span></a>
                        <a><span class="fa fa-close slett-bilag"></span></a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>Oppgavetekst</p>
                </div>
                 @include('purmoduler.regnskap.besvarelser._besvarelsePostering')


            </div>
        @endforeach
    </div>

</div>
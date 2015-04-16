<div role="tabpanel">
    <nav>
        <ul class="pagination" role="tablist">
            @foreach($besvarelse->oppgavesvar as $oppgavesvar)
                <li class="@if($oppgavesvar->moduloppgavesvar_id == 1) active @endif">
                    <a href="#bilag{{ $oppgavesvar->moduloppgavesvar_id }}" aria-controls="bilag{{ $oppgavesvar->moduloppgavesvar_id }}" role="tab" data-toggle="tab">
                        {{ $oppgavesvar->moduloppgavesvar_id }} <span class="sr-only">(current)</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div class="tab-content">

        @foreach($besvarelse->oppgavesvar as $oppgavesvar)
            <div id="bilag{{ $oppgavesvar->moduloppgavesvar_id }}" class="tab-pane panel panel-primary @if($oppgavesvar->moduloppgavesvar_id == 1) active @endif" role="tabpanel">
                <div class="panel-heading">
                    <h3 id="bilagstittel{{ $oppgavesvar->moduloppgavesvar_id }}HeadingVis" class="panel-title">Bilag {{ $oppgavesvar->moduloppgavesvar_id }}</h3>

                    <div class="panel-action-bar pull-right">
                        <a data-toggle="collapse" href="#bilag{{ $oppgavesvar->moduloppgavesvar_id }}"><span class="fa fa-compress"></span></a>
                        <a><span class="fa fa-close slett-bilag"></span></a>
                    </div>
                </div>
                <div class="panel-body">
                </div>
                    @include('purmoduler.regnskap.besvarelser._besvarelsePostering')


            </div>
        @endforeach
    </div>

</div>

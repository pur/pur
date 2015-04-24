<div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel-heading hidden-xs">
        <div class="row">
            <div class="col-sm-2">
                <b>Oppgavesett:</b>
            </div>
            <div class="col-sm-2">
                <b>Påbegynte svar:</b>
            </div>
            <div class="col-sm-2">
                <b>Påbegynt:</b>
            </div>
            <div class="col-sm-2">
                <b>Frist:</b>
            </div>
            <div class="col-sm-2">
                <b>Levert:</b>
            </div>
            <div class="col-sm-2 actions">
                <b>Handlinger:</b>
            </div>
        </div>
    </div>
    @foreach($besvarelser as $besvarelse)
        <div class="list-group-item">
            <div class="row">
                <div class="col-sm-2">
                    <span class="visible-xs-inline">Beskrivelse: </span>{{ $besvarelse->oppgavesett->beskrivelse }}
                </div>
                <div class="col-sm-2">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                             aria-valuenow="{{ $besvarelse->prosentPaabegynt() }}"
                             aria-valuemin="0" aria-valuemax="{{ $besvarelse->antKrevdeSvar() }}"
                             style="{{ "width: " . $besvarelse->prosentPaabegynt() . "%" }}; @if($besvarelse->prosentPaabegynt() > 0)min-width: 2em;@endif">
                            {{ $besvarelse->prosentPaabegynt() }}%
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <span class="visible-xs-inline">Påbegynt: </span>{{ $besvarelse->oppgavesett->tidOpprettet() }}
                </div>
                <div class="col-sm-2">
                    <span class="visible-xs-inline">Frist: </span>{{ $besvarelse->oppgavesett->tidLukket() }}
                </div>
                <div class="col-sm-2">
                    <span class="visible-xs-inline">Levert: </span>{{ $besvarelse->tidLevert() }}
                </div>
                <div class="col-sm-2 actions">
                    <div class="pull-right">
                        <a href="{{ URL::route('besvarelser.vis', $besvarelse) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis besvarelse">
                            <span class="fa fa-eye"></span>
                        </a>
                        @if(!$besvarelse->kanEndres())
                             @if($besvarelse->erLevert())
                                <a class="btn btn-default disabled " data-toggle="tooltip" data-placement="top" data-container="body" title="Kan ikke endres. Besvarelse levert">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @else
                                <a class="btn btn-default disabled " data-toggle="tooltip" data-placement="top" data-container="body" title="Kan ikke endres. Frist utløpt">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endif
                        @endif
                        @if($besvarelse->kanEndres())
                            <a href="{{-- URL::route('besvarelse.edit', $besvarelse) --}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Fortsett oppgave">
                                <span class="fa fa-edit"></span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
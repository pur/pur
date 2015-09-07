@if($oppgaver->count() > 0)

    <div class="list-group panel panel-primary" role="tablist" aria-multiselectable="true">
        <div class="panel-heading hidden-xs">
            <div class="row">
                @if($oppgaverKanVelges)
                    <div class="col-sm-1">
                        <b>Velg:</b>
                    </div>
                @endif
                <div class="col-sm-6">
                    <b>Beskrivelse:</b>
                </div>
                <div class="col-sm-5">
                    <b>Laget av:</b>
                </div>
            </div>
        </div>

        @foreach($oppgaver as $oppgave)

            <div class="list-group-item">
                <div class="row">
                    @if($oppgaverKanVelges)
                        <div class="col-sm-1">
                            {!! Form::checkbox('oppgaver[]', $oppgave->id,
                                      isset($settoppgaver) ? $settoppgaver->contains($oppgave->id) : false) !!}
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <span class="visible-xs-inline">Beskrivelse: </span>
                        {{ $oppgave->beskrivelse }}
                    </div>
                    <div class="col-sm-5">
                        <span class="visible-xs-inline">Laget av: </span>
                        {{ $oppgave->skaper->fulltNavn() }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
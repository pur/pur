<div class="row">
    <div class="col-sm-12">
        <div class="row">
            @if(isset($bilagsmalsekvens))
                <div class="form-group col-sm-8">
                    <p>Sist endret: {{ $bilagsmalsekvens->tidEndret() }}</p>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="form-group col-sm-8">
                <div class="input-group">
                    <div class="input-group-addon">Beskrivelse</div>
                    {!! Form::text('beskrivelse', isset($bilagsmalsekvens) ? $bilagsmalsekvens->oppgave->beskrivelse : '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-group">
                    <div class="input-group-addon">Motpart</div>
                    {!! Form::input('text', 'motpart', null, ['class' => 'form-control', 'id' => 'motpart']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Lagre', ['class' => 'btn btn-primary']) !!}
    {!! link_to_route('oppgaver.opplist', 'Avbryt', null, ['class' => 'btn btn-warning']) !!}
</div>
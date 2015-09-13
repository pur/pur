<div class="form-group col-sm-6">
    {!! Form::label('tittel', '* Tittel:') !!}
    {!! Form::text('tittel', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type', '* Type:') !!}
    <div class="radio">
        <label class="radio-inline">
            {!! Form::radio('type', 'øving') !!} Øvingsoppgavesett
        </label>
        <label class="radio-inline">
            {!! Form::radio('type', 'oblig') !!} Obligatorisk oppgavesett
        </label>
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('beskrivelse', 'Beskrivelse:') !!}
    {!! Form::textarea( 'beskrivelse', null, ['class' => 'form-control', 'style' => 'height: 75px;']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tid_publisert', '* Publiseringstidspunkt:') !!}
    <div class='input-group date' id='datetimepicker3'>
        {!! Form::input('text', 'tid_publisert', isset($oppgavesett) ? $oppgavesett->tidPublisert() : '', ['class' => 'form-control']) !!}
        <div class="input-group-addon btn btn-default">
            <span class="fa fa-calendar"></span>
        </div>
    </div>
</div>
<div class="col-sm-6">
    <blockquote class="bq-info bq-input-align">
        <p>NB! Oppgavesettet kan ikke endres/slettes etter publisering</p>
    </blockquote>
</div>
<div class="clearfix"></div>

<div class="form-group col-sm-6">
    {!!Form::label('tid_aapent', '* Åpent for oppgaveløsing fra:') !!}
    <div class='input-group date' id='datetimepicker1'>
        {!! Form::input('text', 'tid_aapent', isset($oppgavesett) ? $oppgavesett->tidAapent() : '', ['class' => 'form-control']) !!}
        <span class="input-group-addon btn btn-default">
                    <span class="fa fa-calendar"></span>
                </span>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tid_lukket', '* Åpent for oppgaveløsing til:') !!}
    <div class='input-group date' id='datetimepicker2'>
        {!! Form::input('text', 'tid_lukket', isset($oppgavesett) ? $oppgavesett->tidLukket() : '', ['class' => 'form-control']) !!}
        <div class="input-group-addon btn btn-default">
            <span class="fa fa-calendar"></span>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<section class="padding responsive-table">
    <h2>Inkluder oppgaver</h2>
    @include('oppgaver._oppgsett-liste', ['oppgaver' => $alleOppgaver, 'oppgaverKanVelges' => true])
</section>

<div class="form-group col-sm-12">
    {!! Form::submit('Lagre', ['class' => 'btn btn-primary']) !!}
    {!! link_to_route('oppgavesett.opplist', 'Avbryt', null, ['class' => 'btn btn-warning']) !!}
</div>

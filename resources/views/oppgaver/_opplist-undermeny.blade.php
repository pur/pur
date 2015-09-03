@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem2" href="{{ route('regnskap.oppgaver.opprett') }}"
           data-toggle="tooltip" data-placement="bottom" data-container="body" title="Legg til oppgave">
            <span class="fa fa-plus"></span> Legg til oppgave
        </a>
    </li>
@endsection

@section('menuright')
@endsection






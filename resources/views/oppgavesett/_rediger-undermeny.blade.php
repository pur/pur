@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Legg til oppgave"><span class="fa fa-plus"></span> Legg til oppgave</a>
    </li>
    <li>
        <a id="submenuitem2" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Fjern valgte oppgaver"><span class="fa fa-eraser"></span> Fjern valgte oppgaver</a>
    </li>
    <li>
        <a id="submenuitem3" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett oppgavesett"><span class="fa fa-trash"></span> Slett oppgavesett</a>
    </li>
@endsection
@section('menuright')

@endsection
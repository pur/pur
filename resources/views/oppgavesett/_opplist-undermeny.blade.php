@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" href="{{ URL::route('oppgavesett.opprett') }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Legg til oppgavesett"><span class="fa fa-plus"></span> Legg til oppgavesett</a>
    </li>
    <li>
        <a id="submenuitem2" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett valgte oppgavesett"><span class="fa fa-trash"></span> Slett valgte oppgavesett</a>
    </li>
@endsection
@section('menuright')

@endsection
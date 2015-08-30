@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" href="{{ route('oppgavesett.opprett') }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Legg til oppgavesett"><span class="fa fa-plus"></span> Legg til oppgavesett</a>
    </li>
@endsection
@section('menuright')

@endsection
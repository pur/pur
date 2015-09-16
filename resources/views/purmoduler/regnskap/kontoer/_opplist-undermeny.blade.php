@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" href="{{ route('regnskap.kontoer.opprett') }}" data-toggle="tooltip" data-placement="bottom"
           data-container="body" title="Legg til konto"><span class="fa fa-plus"></span> Legg til konto</a>
    </li>
@endsection

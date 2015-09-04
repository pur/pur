@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" href="{{ URL::route('regnskap.oppgaver.rediger', $bilagsmalsekvens) }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Rediger bilagssekvens">
            <span class="fa fa-edit"></span> Rediger bilagssekvens
        </a>
    </li>
    <li>
        <a id="submenuitem2" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett bilagssekvens">
            <span class="fa fa-trash"></span> Slett bilagssekvens
        </a>
    </li>
@endsection
@section('menuright')
@endsection
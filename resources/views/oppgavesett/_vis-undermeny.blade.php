@extends('_undermeny')
@section('menuleft')
    @if(!$oppgavesett->erPublisert())
    <li>
        <a id="submenuitem1" href="{{ URL::route('oppgavesett.rediger', $oppgavesett) }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Rediger oppgavesett"><span class="fa fa-plus"></span> Rediger oppgavesett</a>
    </li>
    <li>
        <a id="submenuitem2" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett oppgavesett"><span class="fa fa-trash"></span> Slett oppgavesett</a>
    </li>
    @endif
@endsection
@section('menuright')

@endsection
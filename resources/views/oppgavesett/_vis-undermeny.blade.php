@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" href="{{ URL::route('oppgavesett.edit', $oppgavesett) }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Rediger oppgavesett"><span class="fa fa-plus"></span> Rediger oppgavesett</a>
    </li>
    <li>
        <a id="submenuitem2" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett oppgavesett"><span class="fa fa-trash"></span> Slett oppgavesett</a>
    </li>
@endsection
@section('menuright')

@endsection
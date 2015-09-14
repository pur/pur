@extends('_undermeny')
@section('menuleft')
    @if(!$oppgavesett->erPublisert())
    <li>
        <a id="submenuitem1" href="{{ URL::route('oppgavesett.rediger', $oppgavesett) }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Rediger oppgavesett"><span class="fa fa-plus"></span> Rediger oppgavesett</a>
    </li>
    <li>
        <a id="submenuitem2" class="ikke-implementert disabled" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett oppgavesett"><span class="fa fa-trash"></span> Slett oppgavesett</a>
    </li>
    @endif
    <li>
        {!! Form::open(['route' => ['oppgavesett.test', $oppgavesett], 'method' => 'POST', 'class' => 'form-inline']) !!}
        <button type="submit" class="btn-menu" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Test oppgavesett"><span class="fa fa-binoculars"></span> Test oppgavesett</button>
        {!! Form::close() !!}
    </li>
@endsection
@section('menuright')

@endsection
@extends('_undermeny')
@section('menuleft')
    <li>
        <a id="submenuitem1" class="ikke-implementert disabled" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Legg til oppgave"><span class="fa fa-plus"></span> Legg til oppgave</a>
    </li>
    <li>
        <a id="submenuitem3" class="ikke-implementert disabled" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett oppgavesett"><span class="fa fa-trash"></span> Slett oppgavesett</a>
    </li>
    <li>
        {!! Form::open(['route' => ['oppgavesett.test', $oppgavesett], 'method' => 'POST', 'class' => 'form-inline']) !!}
        <button type="submit" class="btn-menu" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Test oppgavesett"><span class="fa fa-binoculars"></span> Test oppgavesett</button>
        {!! Form::close() !!}
    </li>
@endsection
@section('menuright')

@endsection
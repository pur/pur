@extends('_undermeny')
@section('menuleft')
    <li>
        <a class="ikke-implementert disabled" id="submenuitem1" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Send inn besvarelse"><span class="fa fa-upload"></span> Send inn besvarelse</a>
    </li>
    <li>
        {!! Form::open(['route' => ['besvarelser.slett', $besvarelse->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
            <button type="submit" class="btn-menu bekreft-slett" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett besvarelse"><span class="fa fa-trash"></span> Slett besvarelse</button>
        {!! Form::close() !!}
    </li>
@endsection
@section('menuright')
@endsection
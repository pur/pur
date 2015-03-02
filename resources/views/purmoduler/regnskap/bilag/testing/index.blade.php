@extends('pur')

@section('content')

    <style type="text/css">
        th, td {
            border: 1px solid gray;
            padding: 2px 15px;
            text-align:right;
        }
    </style>

    <h1>Alle bilag
        <small>(test)</small>
    </h1>
    @foreach($bilagsett as $bilag)

        <h2>{{ $bilag->bilagsmal->bilagstype }}</h2>
        {{--<ul>
            <li><b>bilagsmal_id:</b>   {{ $bilag->bilagsmal_id }} </li>
            <li><b>sekvensposisjon:</b> {{ $bilag->sekvensposisjon }}</li>
            <li><b>besvarelse_id:</b> {{ $bilag->besvarelse_id}}</li>
        </ul>--}}

        <h3>Posteringer</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Tidspunkt for lagring</th>
                <th>Konto</th>
                <th>Beløp</th>
                <th>Fasit? (1/0)</th>
                <th>Antall lagringer</th>
                <th>Tilhører bilag (id)</th>
            </tr>
            <tr>
                @foreach($bilag->elevposteringer as $postering)
            <tr>
                <td>{{ $postering->id }}</td>
                <td>{{ $postering->tid_lagret }}</td>
                <td>{{ $postering->kontokode }}</td>
                <td>{{ $postering->belop }}</td>
                <td>{{ $postering->er_fasit }}</td>
                <td>{{ $postering->ant_lagringer }}</td>
                <td>{{ $postering->bilag_id }}</td>
            </tr>
            @endforeach
        </table>
        <hr/>
    @endforeach

@endsection

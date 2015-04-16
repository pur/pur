@extends('pur')

@section('content')

 <div class="container">

    <h1>Alle bilag
        <small>(test)</small>
    </h1>
    @foreach($bilagsett as $bilag)

        <h2>Bilag {{ $bilag->id }}</h2>
            <p>Tilhører bilagssekvens: <b>{{ $bilag->bilagssekvens->id }}</b>
               som tilhører besvarelse <b>{{ $bilag->bilagssekvens->besvarelse->id }}</b></p>

        <h3>Posteringer</h3>
         <p class="lead">Besvarelse </p>
        <table class="table table-striped">
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

                <p class="lead">Fasit: </p>

         <table class="table table-striped">
             <tr>
                 <th>ID</th>
                 <th>Tidspunkt for lagring</th>
                 <th>Konto</th>
                 <th>Beløp</th>
                 <th>Fasit? (1/0)</th>
                 <th>Antall lagringer</th>
                 <th>Tilhører bilag (id)</th>
             </tr>
            @foreach($bilag->fasitposteringer as $postering)
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
 </div>
@endsection

    <h1>Bilagssekvenser</h1>

    @foreach($bilagssekvenser as $bilagssekvens)

        <p>{{ $bilagssekvens->beskrivelse }}<br />Laget av {{ $bilagssekvens->skaper->fornavn }}</p>

    @endforeach
<div id="bilagsgruppe">
    <div role="tabpanel">
        <nav>
            <ul class="pagination" role="tablist">
                @foreach($bilagssamling as $bilag)
                    <li class="@if($bilag->id == 1) active @endif">
                        <a href="#bilag{{ $bilag->id }}" aria-controls="bilag{{ $bilag->id }}" role="tab" data-toggle="tab">
                            {{ $bilag->id }} <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <section>
        <div class="tab-content">

            @foreach($bilagssamling as $bilag)

                <div id="bilag{{ $bilag->id }}" class="tab-pane panel panel-primary @if($bilag->id == 1) active @endif" role="tabpanel">

                    <div class="panel-heading">
                        <h3 id="bilagstittel{{ $bilag->id }}HeadingVis" class="panel-title">Bilag {{ $bilag->id }} - {{ $bilag->bilagsmal->bilagstype}}</h3>
                    </div>
                    <div class="panel-body">
                        {{ $bilag->bilagsmal->infotekst}}
                    </div>
                    <div class="panel-body">
                       <b>Bruttobeløp: {{ $bilag->belop() }},–</b>
                    </div>

                    @include('purmoduler.regnskap.besvarelser._posteringer', ['bilag' => $bilag])

                </div>

            @endforeach

        </div>
        </section>
    </div>
</div>

@section('scripts')
    <script src="{{ env('APPWEBPATH') }}/js/ajaxformsubmit.js"></script>
@endsection
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
                    <div id="bilag{{ $bilag->id }}" class="tab-pane panel bilag panel-primary @if($bilag->id == 1) active @endif" role="tabpanel">
                        <div class="panel-heading">
                            <h3 id="bilagstittel{{ $bilag->id }}HeadingVis" class="panel-title">Bilag {{ $bilag->id }} - {{ $bilag->bilagsmal->bilagstype}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="lead">Bruttobeløp: {{ $bilag->belop() }},–</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                   <p class="lead"> {{ $bilag->bilagsmal->bilagsmalsekvens->motpart}}</p>
                                </div>
                                <div class="col-sm-12">
                                    {{ $bilag->bilagsmal->infotekst}}
                                </div>
                            </div>
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
    <script src="{{ env('APPWEBPATH') }}/js/besvarelse.js"></script>
@endsection
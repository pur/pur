<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Vis meny</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav navbar-nav navbar-brand">
                @if(Request::segment(1) == 'regnskap')
                    <a href="{{ URL::route('oppgavesett.opplist') }}">pur:Regnskap</a>
                @elseif(Request::segment(1) == 'koi-analyse')
                    <a href="{{ URL::route('oppgavesett.opplist') }}">pur:KOI-analyse</a>
                @elseif(Request::segment(1) != 'regnskap')
                    <a href="{{ env('APPWEBPATH') }}/" role="button" aria-expanded="false">pur</a>
                @endif
            </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    @if(Auth::user()->erLaerer() && Request::segment(1) == 'regnskap')
                        @include('toppmenyer._regnskap-laerer')
                    @endif
                    @if(Auth::user()->erStudent() && Request::segment(1) == 'regnskap')
                        @include('toppmenyer._regnskap-student')
                    @endif
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())

                   {{--<li><a href="/auth/register">Registrer</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->fulltNavn() }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="{{ URL::route('brukere.vis.innlogget') }}"><span class="fa fa-user"></span> Min brukerprofil</a>
                            </li>
                            <li>
                                <a href="{{ env('APPWEBPATH') }}/"><span class="fa fa-th"></span> Velg purmodul</a>
                            </li>
                            <li>
                                <a href="{{ env('APPWEBPATH') }}/auth/logout"><span class="fa fa-sign-in"></span> Logg ut av pur</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

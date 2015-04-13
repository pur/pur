<!DOCTYPE html>
<head>
    <title>Pur</title>
    <meta charset="utf-8">
    <link href="{{ env('APPWEBPATH') }}/css/bootstrap-datetime.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/pur.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ env('APPWEBPATH') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="loading"></div>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <li class="nav navbar-nav dropdown">
            <a href="/" class="navbar-brand dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">pur:Regnskap <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ URL::route('oppgaver.vis', null) }}">
                            <span class="fa fa-list"></span> Alle fagmoduler
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-on"></span> Regnskap
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-off"></span> SQL
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-off"></span> Java
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-off"></span> Statistikk
                        </a>
                    </li>
                </ul>
            </li>
        </div>






        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="/">Hjem</a></li>
                    @if(Auth::user()->erLaerer())
                        @include('toppmenyer._regnskap-laerer')
                    @endif
                    @if(Auth::user()->erStudent())
                        @include('toppmenyer._regnskap-student')
                    @endif
                </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login"><span class="fa fa-sign-in"></span> Logg inn</a></li>
                    {{--<li><a href="/auth/register">Registrer</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->fulltNavn() }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{ URL::route('brukere.vis', Auth::user()->id) }}">
                                    <span class="fa fa-user"></span> Min konto</a></li>
                            <li><a href="/auth/logout"><span class="fa fa-sign-in"></span> Logg ut</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<footer class="footer">
    <div class="container">
        <p class="text-center text-muted">pur Regnskap</p>

        <p class="text-center text-muted">Laget av
            <a href="http://syntax-error.no/">SyntaxError</a> for Høgskolen i Telemark</p>

        <p class="text-center text-muted">Kode lisensiert under
            <a href="https://github.com/HiT-SyntaxError/pur/blob/master/LICENSE">GNU General Public License</a></p>
        </p>
    </div>
</footer>
<script src="{{ env('APPWEBPATH') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/bootstrap.min.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/moment-with-locales.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/bootstrap-datetime.js"></script>

<script src="{{ env('APPWEBPATH') }}/js/globalScripts.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/usabilla-feedback.js"></script>


@yield('scripts')


</body>
</html>
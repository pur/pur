<!DOCTYPE html>
<head>
    <title>Pur</title>
    <meta charset="utf-8">
    <!-- Fonts -->
    <link href="{{ env('APPWEBPATH') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/lato.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/fonts/roboto/stylesheet.css" rel="stylesheet">

   <!-- <link href="{{ env('APPWEBPATH') }}/css/bootstrap-datetime.css" rel="stylesheet"> -->
    <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/main.css" rel="stylesheet">
   <!-- <link href="{{ env('APPWEBPATH') }}/css/material.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/pur.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/ripples.css" rel="stylesheet"> -->
</head>
<body>
<div class="loading" style="background: url({{ env('APPWEBPATH') }}/images/loading-animation.gif) center no-repeat #fff;"></div>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Vis meny</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav navbar-nav dropdown">


                <a href="/" class="navbar-brand dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">pur:Regnskap
                    <span class="caret"></span></a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ URL::route('oppgaver.opplist') }}">
                            <span class="fa fa-list"></span> Alle Pur-moduler
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-on"></span> Regnskap
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-off"></span> Purmodul
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-off"></span> Purmodul
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="fa fa-toggle-off"></span> Purmodul
                        </a>
                    </li>
                </ul>

            </div>
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
                    <li><a href="{{ env('APPWEBPATH') }}/auth/login"><span class="fa fa-sign-in"></span> Logg inn</a></li>
                    {{--<li><a href="/auth/register">Registrer</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->fulltNavn() }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{ URL::route('brukere.vis.innlogget') }}">
                                    <span class="fa fa-user"></span> Min brukerprofil</a></li>
                            <li><a href="{{ env('APPWEBPATH') }}/auth/logout"><span class="fa fa-sign-in"></span> Logg ut</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<main>
@yield('content')
</main>

<footer class="footer">
    <div class="container">
        <p class="text-center text-muted"></p>

        <p class="text-center text-muted">Pur er laget av
            <a href="http://syntax-error.no/">SyntaxError</a> på oppdrag fra Høgskolen i Telemark</p>

        <p class="text-center text-muted">som fri programvare lisensiert under
            <a href="https://github.com/HiT-SyntaxError/pur/blob/master/LICENSE" target="_blank">GNU General Public License</a></p>
        </p>
    </div>
</footer>

<script src="{{ env('APPWEBPATH') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/jquery.autosize.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/bootstrap.min.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/moment-with-locales.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/bootstrap-datetime.js"></script>

<script src="{{ env('APPWEBPATH') }}/js/globalScripts.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/ripples.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/material.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
<script>
    $(function(){
        $('.normal').autosize();
        $('.animated').autosize();
    });
</script>

@yield('scripts')


</body>
</html>
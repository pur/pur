<!DOCTYPE html>
<head>
    <title>Pur</title>
    <meta charset="utf-8">
    <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/pur.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ env('APPWEBPATH') }}/css/font-awesome.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pur</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Hjem</a></li>
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Utforsk <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{!! link_to_route('bruker.show', 'Brukere', null) !!}</li>
                        <li>{!! link_to_route('oppgavesett.show', 'Oppgavesett', null) !!}</li>
                        <li>{!! link_to_route('bilagssekvens.show', 'Bilagssekvenser', null) !!}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mine
                        oppgaver <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{!! link_to_route('oppgavesett.show', 'Oppgavesett', null) !!}</li>
                        <li>{!! link_to_route('bilagssekvens.show', 'Bilagssekvenser', null) !!}</li>
                    </ul>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Logg inn</a></li>
                    {{--<li><a href="/auth/register">Registrer</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->fulltNavn() }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logg ut</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
<script src="{{ env('APPWEBPATH') }}/js/jquery-1.11.2.min.js"></script>
<script src="{{ env('APPWEBPATH') }}/js/bootstrap.min.js"></script>



@yield('scripts')

</body>
</html>
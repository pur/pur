<!DOCTYPE html>
<head>
    <title>Pur</title>
    <meta charset="utf-8">
    <!-- Fonts -->
    <link href="{{ env('APPWEBPATH') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/lato.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/fonts/roboto/stylesheet.css" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">
    <link href="{{ env('APPWEBPATH') }}/css/main.css" rel="stylesheet">

</head>
<body>
<div class="loading" style="background: url({{ env('APPWEBPATH') }}/images/loading-animation.gif) center no-repeat #fff;"></div>
@include('_meny')
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
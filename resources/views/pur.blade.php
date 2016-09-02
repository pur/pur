<!DOCTYPE html>
<head>
    <title>Pur</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
   <!--
    <link href="{{ env('APPWEBPATH') }}/css/lato.css" rel="stylesheet"> -->

    <!-- Stylesheets -->

    <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">

</head>
<body>
<script src="{{ env('APPWEBPATH') }}/js/analytics-demotjener.js"></script>
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

<script src="{{ env('APPWEBPATH') }}/js/all.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
<script>
    $(function(){
        autosize($('.animated'));
        autosize($('.normal'));
    });
</script>

@yield('scripts')

@include('_flash')

</body>
</html>
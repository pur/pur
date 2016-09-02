<html>
<head>
    <title>Pur</title>
    <meta charset="utf-8">

    <!-- Stylesheets -->
    <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">


</head>
<body class="welcome">
<div class="container">
    <div class="content">
        <div class="title">Pur</div>
    <!-- <div class="quote">{{ Inspiring::quote() }}</div> -->
        <div class="quote">Tren på essensen - ikke konteksten!</div>
        <a href="{{ env('APPWEBPATH') }}/auth/login" class="btn btn-default">Logg inn</a>
        <a href="{{ env('APPWEBPATH') }}/auth/register" class="btn btn-default">Opprett bruker</a>
    </div>
</div>

<script src="{{ env('APPWEBPATH') }}/js/all.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>
</html>

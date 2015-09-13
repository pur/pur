<html>
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

        <script src="{{ env('APPWEBPATH') }}/js/jquery-1.11.2.min.js"></script>
        <script src="{{ env('APPWEBPATH') }}/js/bootstrap.min.js"></script>

        <script src="{{ env('APPWEBPATH') }}/js/globalScripts.js"></script>
        <script src="{{ env('APPWEBPATH') }}/js/ripples.js"></script>
        <script src="{{ env('APPWEBPATH') }}/js/material.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
        </script>
	</body>
</html>

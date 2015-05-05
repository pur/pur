<html>
	<head>
        <link href="{{ env('APPWEBPATH') }}/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ env('APPWEBPATH') }}/css/lato.css" rel="stylesheet">
        <link href="{{ env('APPWEBPATH') }}/fonts/roboto/stylesheet.css" rel="stylesheet">

        <link href="{{ env('APPWEBPATH') }}/css/app.css" rel="stylesheet">
        <link href="{{ env('APPWEBPATH') }}/css/material.css" rel="stylesheet">
        <link href="{{ env('APPWEBPATH') }}/css/pur.css" rel="stylesheet">
        <link href="{{ env('APPWEBPATH') }}/css/ripples.css" rel="stylesheet">

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
                color: #FFF;
				display: table;
				font-weight: 100;
                background: #337AB7; /* Old browsers */
                /* IE9 SVG, needs conditional override of 'filter' to 'none' */
                background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiMyMzI1MmEiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjMTExMjE0IiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L3JhZGlhbEdyYWRpZW50PgogIDxyZWN0IHg9Ii01MCIgeT0iLTUwIiB3aWR0aD0iMTAxIiBoZWlnaHQ9IjEwMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
                background: -moz-radial-gradient(center, ellipse cover,  #337AB7 0%, #226AA7 100%); /* FF3.6+ */
                background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,#337AB7), color-stop(100%,#226AA7)); /* Chrome,Safari4+ */
                background: -webkit-radial-gradient(center, ellipse cover,  #337AB7 0%,#226AA7 100%); /* Chrome10+,Safari5.1+ */
                background: -o-radial-gradient(center, ellipse cover,  #337AB7 0%,#226AA7 100%); /* Opera 12+ */
                background: -ms-radial-gradient(center, ellipse cover,  #337AB7 0%,#226AA7 100%); /* IE10+ */
                background: radial-gradient(ellipse at center,  #337AB7 0%,#226AA7 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#337AB7', endColorstr='#226AA7',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */

            }

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 20px;
                font-family: 'LatoThin';
			}

			.quote {
				font-size: 24px;
                margin-bottom: 20px;
                font-family: 'LatoThin';
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Pur</div>
				<!-- <div class="quote">{{ Inspiring::quote() }}</div> -->
                <div class="quote">Tren på essensen - ikke konteksten!</div>
                <a href="{{ env('APPWEBPATH') }}/auth/login" class="btn btn-default">Prøv!</a>
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

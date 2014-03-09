<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
        <title>TooWrappedUp - Gift Chooser</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/jumbotron-narrow.css" rel="stylesheet">
        <link href="css/slider.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="/css/highlight.css" />
        <link rel="stylesheet" type="text/css" href="/css/simple-slider.css" />
        <link rel="stylesheet" type="text/css" href="/css/simple-slider-volume.css" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/simple-slider.js"></script>
        <style>
            .mandatory {
                display: none;
            }
            .well {
                background-color: #F5F5F5;
                border: 1px solid #E3E3E3;
                border-radius: 4px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
                margin-bottom: 20px;
                min-height: 20px;
                padding: 10px;
            }
            body{
                font-size: 12px;
            }
            .form-group {
                margin-bottom: 0;
            }
            .invalid {
                color:#A94442;
                font-style:italic;
            }
            .invalid_text {
                color:#A94442;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('navigation')
            @yield('content')
            <div class="footer"></div>
        </div> <!-- /container -->
    </body>
</html>
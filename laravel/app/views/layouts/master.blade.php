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
        
    </head>
    <body>
        <div class="container">
            @yield('navigation')
            @yield('content')
            <div class="footer">
                <p>&copy; TooWrappedUp.com 2014</p>
            </div>
        </div> <!-- /container -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-slider.js"></script>        
        <script type="text/javascript">
            $(document).ready(function(){       
                $('#slider').slider({
                    min: 1,
                    max: 3,
                    value: 1,
                    formater: function(value) {
                        
                        var opinionArray = new Array;
                        
                        opinionArray[1] = "I don't really like this :(";
                        opinionArray[2] = "It's OK :)";
                        opinionArray[3] = "It's great :D";
                        //opinionArray[4] = "Definately buy it for someone";
                        
                        $("#opinion_text").html(opinionArray[value]);                        
                        $("#opinion").val(opinionArray[value]);
                        
                        return opinionArray[value];
                        
                    }
                });
            });
        </script>

    </body>
</html>
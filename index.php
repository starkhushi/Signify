<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Your Name">
        <link rel="icon" href="images/favicon.png">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet"> 
        <link href="css/custom.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>          
        <title>ISL : Home Page</title>           
    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="background:#337ab7;color:white;">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="padding:0;padding-left:10px;">
                        <h1 style="padding:0; margin:0;">
                            <img src="admin/logo.png" style="height:55px;">
                        </h1>
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="http://islfromtext.in/avatarfinal.php">Try System Now</a></li>
                        <li><a href="objective.php">Objective</a></li>
                        <li><a href="video_calling.php">Video Calling</a></li>
                        <li><a href="ar_view.php">AR View</a></li>
                        <li><a href="courses.php">Courses</a></li>
                        <li><a href="contributors.php">Contributors</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-right">
                    <img src="images/avatar2.png">
                </div>
                <div class="col-md-6 text-center">
                    <h2 style="font-family: 'Baloo', cursive; font-size:16px; margin-top:0; padding-top:0;">Hello! We are your ISL interpreters.</h2>
                    <h2 style="font-size:25px;">नमस्ते। हम आपके ISL अनुवादक हैं। </h2><hr>
                    <h1 style="font-family: 'Baloo', cursive; margin-bottom:0; padding-bottom:0;">Text to Indian Sign Language conversion</h1>
                    <p style="padding-left:10%; padding-right:10%; line-height:35px; font-size:16px;">
                        Bridging the gap between the deaf/dumb and the hearing/speaking community. Bringing inclusivity and understanding to everyone.
                    </p><br>
                    <a href="http://islfromtext.in/avatarfinal.php">
                        <button type="button" class="btn btn-primary btn-lg">Experience us now!</button>
                    </a><br><br>
                </div>
                <div class="col-md-3">
                    <img src="images/avatar.png">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="font-size:13px; margin-bottom:20px;"><hr>
                    Bringing inclusivity to bridge communication gaps.
                </div>
            </div>
        </div>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113307373-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-113307373-1');
        </script>
        <script>
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }
        </script>
    </body>
</html>

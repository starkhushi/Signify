<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Divanshu Singh - Thapar University" >
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  <title>ISL : Avatar Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Access-Control-Allow-Methods" content="GET">
<link rel="stylesheet" href="css/cwasa.css">
<script type="text/javascript" src="avatar_files/allcsa.js"></script>

<!-- Next script is used for English to hindi conversion on the fly; starts here <script src="https://www.google.com/jsapi" type="text/javascript"></script>  -->
<script type="text/javascript" src="js/transliteration.I.js">
    </script>
<script type="text/javascript">
    // Load the Google Transliterate API
    google.load("elements", "1", {
        packages: "transliteration"
    });
    function onLoad() {
        var options = {
            sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage: [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+m',
            transliterationEnabled: true
        };
        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(['transliterateTextarea']);
    }
    google.setOnLoadCallback(onLoad);
 </script>
<!-- script for english to hindi conversion on fly ENDS here -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
/*
  TUavatarLoaded : Global variable to tell if avatar is loaded or not

  This will be set to TRUE in allcsa.js after the avatar
  would have loaded successfully
*/
var TUavatarLoaded = false;

/*
  avatarbusy : Binary lock variable to be checked before
  giving control to next word to be played  
*/
var avatarbusy = false;

/*
  weblog function to write into the debugger area of the
  avatar
*/
function weblog(line)
{
    weblogid = document.getElementById("debugger");
    weblogid.innerHTML=line+"<br>"+weblogid.innerHTML;
}
</script>
</head>
<body onload="CWASA.init();">
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
<div class="container" id="loading">
  <div class="row">
    <div class="col-md-12 text-center">
      <span style="background-color:#ebf8a4; padding: 8px 20px;">
      <i class="fa fa-spinner fa-spin"></i> Loading application. Please wait...</span>
    </div>
  </div>
</div>

<div class="container" id="avatar_wrapper" style="display:none;">
  <div class="row">
    <div class="col-md-6">
        <h1 id="hellomsg" style="font-weight:bold;">Hello ! I am your ISL avatar.</h1>
          <div id="leftSide" style="display:none;">

            <ul class="nav nav-tabs nav-justified" id="navi">
              <li role="presentation"><a href="#" id="menu1-h" onclick="activateTab('menu1-h', 'menu1');">English to ISL</a></li>
              <li role="presentation"><a href="#" id="menu2-h" onclick="activateTab('menu2-h', 'menu2');">Hindi to ISL</a></li>
              <li role="presentation"><a href="#" id="menu3-h" onclick="activateTab('menu3-h', 'menu3');">Examples</a></li>
              <!--<li role="presentation"><a href="#" id="menu4-h" onclick="activateTab('menu4-h', 'menu4');">Numbers</a></li>-->
            </ul>

            <div id="menu1">
            <br>
            <label>Enter English text here</label>
            <textarea id="engtext" class="form-control" style="width:100%; height:80px;"></textarea><br>
            <button type="button" id="playeng" class="btn btn-primary">Play</button>
            <button type="button" id="btnClearEng" class="btn btn-default">Clear</button>

            </div>
            <div id="menu2">
            <br>
            <label for="transliterateTextarea">Type text to convert to hindi:</label><br>
            <textarea class="form-control" id="transliterateTextarea" name="transliterateTextarea" style="width:100%; height:80px;"></textarea><br>
            <textarea id="hinditext" class="form-control" style="width:100%; height:80px; display:none;"></textarea>
            <button type="button" id="playhindi" class="btn btn-primary">Play</button>
            <button type="button" id="btnClearHindi" class="btn btn-default">Clear</button>
            </div>

            <div id="menu3" style="max-height:250px; overflow-y:scroll;">
              <br>
              <label>Example Sentences</label>
<table class="table table-striped">

<tr><td>Hello</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Hello');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>How are you?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('How are you?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>In which class are you in?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('In which class are you in?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>What are your hobbies?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('What are your hobbies?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Which animal do you like most?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Which animal do you like most?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>who is your favourite actor?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('who is your favourite actor?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>who is your favourite actress?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('who is your favourite actress?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>which film do you like most?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('which film do you like most?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>which is your favourite sports?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('which is your favourite sports?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Are you able to understand the actions of a person?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Are you able to understand the actions of a person?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>which colour you like the most?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('which colour you like the most?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>what you like to eat?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('what you like to eat?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>do you love chocolates?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('do you love chocolates?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I am sorry.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I am sorry.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I am a clerk.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I am a clerk.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>There are two books in my bag.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('There are two books in my bag.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Open the door.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Open the door.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I like scooter.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I like scooter.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>How are you?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('How are you?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Are you hungry?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Are you hungry?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I am thinking.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I am thinking.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Ram is a boy.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Ram is a boy.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Are you sick?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Are you sick?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Be careful!</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Be careful!');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Stand up.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Stand up.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>All the best.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('All the best.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Any question?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Any question?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Take care.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Take care.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Do not worry.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Do not worry.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>What are you talking about ?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('What are you talking about ?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Why are you talking?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Why are you talking?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>There is medicine in the bottle.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('There is medicine in the bottle.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>What is the time now?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('What is the time now?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>How far is your home from school?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('How far is your home from school?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>You can read and stay here.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('You can read and stay here.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Are you going to market with me ?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Are you going to market with me ?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>There is no vegetable in the house.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('There is no vegetable in the house.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>How can you solve this question?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('How can you solve this question?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>They are going</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('They are going');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>We are dancing.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('We are dancing.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>They are reading.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('They are reading.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Can you read?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Can you read?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Can you dance?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Can you dance?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>This is not a book.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('This is not a book.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>That is a fan.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('That is a fan.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>This is a notebook.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('This is a notebook.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>That is a tree.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('That is a tree.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>This is a floor.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('This is a floor.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>That is a ceiling.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('That is a ceiling.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>What is that?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('What is that?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I can read.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I can read.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I can play football.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I can play football.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Can you run?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Can you run?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Can you play football?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Can you play football?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I can do yoga.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I can do yoga.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I can not swim.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I can not swim.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>This is my bag.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('This is my bag.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>This is my notebook.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('This is my notebook.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>His brother is ill.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('His brother is ill.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Tomorrow is which day?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Tomorrow is which day?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>How many pens are there?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('How many pens are there?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>How many pencils are there?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('How many pencils are there?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where is your house?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where is your house?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where is your bag?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where is your bag?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where are you going to?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where are you going to?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Why are you late?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Why are you late?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where are you going?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where are you going?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where is your school?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where is your school?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where are you?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where are you?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where is your home?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where is your home?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where is the teacher?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where is the teacher?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Yesterday, I went to market.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Yesterday, I went to market.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Tomorrow is Diwali.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Tomorrow is Diwali.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I love to play.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I love to play.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Those are nurses.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Those are nurses.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>What are you doing?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('What are you doing?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Open the book.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Open the book.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>The schools are now open.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('The schools are now open.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Open the bottle.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Open the bottle.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>What comes after tomorrow?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('What comes after tomorrow?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>You can come before 2.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('You can come before 2.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Who can make this?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Who can make this?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>You can meet me today.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('You can meet me today.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>She gets the salary.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('She gets the salary.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>Where is the bus stand ?</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('Where is the bus stand ?');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I went to the post office.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I went to the post office.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I went to the railway station.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I went to the railway station.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I go to the bus stand.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I go to the bus stand.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>She keeps her notebook in the bag.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('She keeps her notebook in the bag.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>You can choose the pens.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('You can choose the pens.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I need a bottle to drink.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I need a bottle to drink.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>This meal is tasty.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('This meal is tasty.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr><tr><td>I like Aeroplane.</td><td><button type='button' class='btn btn-default btn-sm' onclick="playsign('I like Aeroplane.');">Play <i class='glyphicon glyphicon-play'></i></button></td></tr></table>              
            </div>


            <div id="showdebugger" style="position:fixed; left:0px; top:50%; display:none;">
              <button id="btnshowdebugger" alt="Show Debugger" title="Show Debugger" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-cog"></i></button>
            </div>

            <br><br>
            <div id="debugpane" style="display:none !important;">
            <label>Debugger:</label>
            <button type="button" id="clrDebugger" style="float:right;" class="btn btn-sm btn-small">Clear Debugger</button>
            <button type="button" id="hideDebugger" style="float:right;margin-right:10px;" class="btn btn-sm btn-danger">Hide Debugger</button>
            <div style="clear:both;"></div>
            <div id="debugger"></div>
            </div>
          


          </div><!--left side multi menu pane ends here-->

    </div>

    <div class="col-md-6">
      <div class="CWASAPanel av0" align="center">
        <div class="divAv av0">
          <canvas class="canvasAv av0" ondragstart="return false" width="374" height="403"></canvas>
        </div> 
      </div>
      <div id="currentWord" class="alert alert-warning"></div>
    </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/hindiconvert.js"></script>
<script>
/*
  Hide debugger
*/
$("#hideDebugger").click(function() {
    $("#debugpane").hide();
    $("#showdebugger").show();
    $("#menu3").css("max-height","420px");
});

$("#btnshowdebugger").click(function() {
    $("#debugpane").show();
    $("#showdebugger").hide();
    $("#menu3").css("max-height","250px");
});


/*
  Global SigmlData is a 
  javascript object
*/
var SigmlData;
var lookup = {};

$(document).ready(function() {

  var loadingTout = setInterval(function() {
      if(TUavatarLoaded) {
        clearInterval(loadingTout);
        console.log("MSG: Avatar loaded successfully !");

        setTimeout(function() {
          /*
            When the avatar has loaded
            the loading message is hidden and main wrapper is shown
          */
          $("#loading").hide();
          $(".divCtrlPanel").hide();
          $("#avatar_wrapper").show();

          /*
            As the avatar is shown a hello test is started
            in order to load all the avatar playing dependencies
          */
          console.log("MSG: Starting hello test.");
          $("#currentWord").text("Hello");
          $(".txtaSiGMLText").val('<sigml><hns_sign gloss="hello"><hamnosys_nonmanual><hnm_mouthpicture picture="hVlU"/></hamnosys_nonmanual><hamnosys_manual><hamflathand/><hamthumboutmod/><hambetween/><hamfinger2345/><hamextfingeru/><hampalmd/><hamshouldertop/><hamlrat/><hamarmextended/><hamswinging/><hamrepeatfromstart/></hamnosys_manual></hns_sign></sigml>');
          $(".bttnPlaySiGMLText").click();
          console.log("MSG: Ending hello test");
      
          /*
            After the hello has been played the main control 
            panel is displayed      
          */
          setTimeout(function() {
            $("#hellomsg").hide();
            $("#leftSide").slideDown();
          }, 10000);
    
        }, 6000);
      }
  }, 2000);

  // keep loading things here
  // load all sigml files into cache

  $.getJSON( "SignFiles/signdump.php", function( data ) {
    SigmlData = data;

    // make the lookup table
    for (i = 0, len = SigmlData.length; i < len; i++) {
        lookup[SigmlData[i].w] = SigmlData[i].s;
    }
  });

});  

// code to animate tabs
// to swich between english and hindi input
alltabhead = ["menu1-h", "menu2-h", "menu3-h", "menu4-h"];
alltabbody = ["menu1", "menu2", "menu3", "menu4"];

function activateTab(tabheadid, tabbodyid)
{
    for(x = 0; x < alltabhead.length; x++)
        $("#"+alltabhead[x]).css("background-color", "white");
    $("#"+tabheadid).css("background-color", "#d5d5d5");
    for(x = 0; x < alltabbody.length; x++)
        $("#"+alltabbody[x]).hide();
    $("#"+tabbodyid).show();
	
	//for getting the speech's text from avatarspeechtest.php 
	var simple = '';
			document.getElementById("engtext").value = ''+ simple;
			
			document.getElementById("transliterateTextarea").value = ''+simple;
}

activateTab("menu3-h", "menu3"); // activate first menu by default

// clear button code
$("#btnClearEng").click(function(){
    $("#engtext").val("");
});
$("#btnClearHindi").click(function(){
    $("#transliterateTextarea").val("");
});
$("#clrDebugger").click(function(){
    $("#debugger").html("");
});
/*
  Code for the avatar player goes here
*/

/*
  When play english button is clicked
*/
$("#playeng").click(function() {

  console.log("Started parsing");

  input = $("#engtext").val().trim().replace(/\r?\n/g, ' '); // change newline to space while reading

  if(input.length == 0)
    return;

  input = input.toLocaleLowerCase();

  console.log("sending request to get root words");

  $.getJSON( "newparser.php?l=" + input, function(data) {
    console.log("Got root words");
    console.log(data);
    $("#debugger").text("Play sequence " + JSON.stringify(data));

    /*
      Code to play avatar
    */
  
    playseq = Array();
    for(i = 0; i < data.length; i++)
      playseq.push(data[i]);

    // start playing only if length of data received
    // was more than 0

    if(data.length > 0) {
      var playtimeout = setInterval(function() {

          if(playseq.length == 0 || data.length == 0) {
            clearInterval(playtimeout);
            console.log("Clear play interval");
            avatarbusy=false;
            return;
          }

          if(avatarbusy == false) {
            avatarbusy = true; // this is set to flase in allcsa.js      

            word2play = playseq.shift();    
            weblog("Playing sign :" + word2play);
            if(lookup[word2play]==null) {
              weblog("<span style='color:red;'>SiGML not available for word : " + word2play + "</span>");
              avatarbusy=false;
              
              // break word2play into chars and unshift them to playseq
                for(i = word2play.length - 1; i >= 0; i--)
                  playseq.unshift(word2play[i]);
            

            } else {
              data2play = lookup[word2play];
              console.log(data2play);
              $("#currentWord").text(word2play);
              $(".txtaSiGMLText").val(data2play);
              $(".bttnPlaySiGMLText").click();
            }
          } else {
            console.log("Avatar is still busy");

            // check if error occured then reset the avatar to free
            errtext = $(".statusExtra").val();
            if(errtext.indexOf("invalid") != -1) {
              weblog("<span style='color:red;'>Error: " + errtext + "</span>");
              avatarbusy = false;
            }
          }
      }, 500);
    }

  });

});

$("#playhindi").click(function() {
    input = $("#transliterateTextarea").val().trim().replace(/\r?\n/g,' '); // change newline to space while reading
    processed_input = "";
for(i = 0; i < input.length; i++) {
      if(input[i].charCodeAt(0).toString(16) == "964" || input[i].charCodeAt(0).toString(16) == "3f" || input[i].charCodeAt(0).toString(16) == "7c")
        processed_input = processed_input + " ";
      else
        processed_input = processed_input + input[i];
    }
	
   console.log("MSG : Sending request to get hindi root words");
console.log("MSG :hindi word is "+input+" and processed is "+processed_input);
    $.getJSON( "admin/engtohindi.php?l="+ processed_input, function(data) {
        console.log("Got root words");
        console.log(data);
        $("#debugger").text("Play sequence " + JSON.stringify(data));
		/*
      Code to play avatar
    */
  
    playseq = Array();
    for(i = 0; i<data.length; i++)
      playseq.push(data[i]);

    // start playing only if length of data received
    // was more than 0

    if(data.length > 0) {
      var playtimeout = setInterval(function() {

          if(playseq.length == 0 || data.length == 0) {
            clearInterval(playtimeout);
            console.log("Clear play interval");
            avatarbusy=false;
            return;
          }

          if(avatarbusy == false) {
            avatarbusy = true; // this is set to flase in allcsa.js      

            word2play = playseq.shift();    
            weblog("Playing sign :" + word2play);
            if(lookup[word2play]==null) {
              weblog("<span style='color:red;'>SiGML not available for word : " + word2play + "</span>");
              avatarbusy=false;
              
              // break word2play into chars and unshift them to playseq
                for(i = word2play.length - 1; i >= 0; i--)
                  playseq.unshift(word2play[i]);
            

            } else {
              data2play = lookup[word2play];
              console.log(data2play);
              $("#currentWord").text(word2play);
              $(".txtaSiGMLText").val(data2play);
              $(".bttnPlaySiGMLText").click();
            }
          } else {
            console.log("Avatar is still busy");

            // check if error occured then reset the avatar to free
            errtext = $(".statusExtra").val();
            if(errtext.indexOf("invalid") != -1) {
              weblog("<span style='color:red;'>Error: " + errtext + "</span>");
              avatarbusy = false;
            }
          }
      }, 500);
    }
    });
	
	
	

});

/*
  function to play example sentences
*/
function playsign(line)
{
  $("#engtext").val(line);
  $("#playeng").click();
}

/*window.onerror = function() {
    alert("Error caught");
};*/
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113307373-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113307373-1');
</script>

</body></html>
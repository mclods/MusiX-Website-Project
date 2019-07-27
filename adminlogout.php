<?php

    session_start();

    //clear all session variables
    session_unset();

    //destroy the session
    session_destroy();
    
    //echo "You've logged out! See you next time.<br>";

    //print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MusiX Admin LogIn</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <link href="css/styles.css" rel="stylesheet">
      <link rel="icon" href="images/icon.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="mypage">
    
      <div class="container">

      <div class="page-header">
            <h1><span class="glyphicon glyphicon-heart-empty"></span> ADMIN successfully logged out!</h1>
            
        </div>
          
          
          </div> <!-- /container -->

      <div class="row"><div id="logo" class="col-xs-12"><p class="text-muted center-block">Copyright  &copy;  2019 MusiX, Inc.</p></div></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
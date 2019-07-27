<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MusiX &#45; for everyone</title>
      
      <link rel="icon" href="images/icon.png">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      <!-- Navbar -->
      <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="about.php">MusiX</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse">
            
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if(htmlspecialchars($_SERVER["PHP_SELF"])=="/index.php"){ echo "class='active'"; } ?> ><a href="index.php">Home</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#updateCreditCard" style="color:yellow; font-weight:bold;">Premium</a></li>
                    <li <?php if(htmlspecialchars($_SERVER["PHP_SELF"])=="/help.php"){ echo "class='active'"; } ?> ><a href="help.php">Help</a></li>
                    <li <?php if(htmlspecialchars($_SERVER["PHP_SELF"])=="/downloads.php" || htmlspecialchars($_SERVER["PHP_SELF"])=="/nodownload.php"){ echo "class='active'"; } ?> ><a href="<?php if(empty($_SESSION['loggedInUser'])){ echo "nodownload.php"; }else{
    echo "downloads.php";
} ?>">Downloads</a></li>
                    <li class="dropdown">
                     
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php if(empty($_SESSION['loggedInUser'])){echo 'Account <span class="caret"></span></a> <ul class="dropdown-menu"> <li><a href="signup.php">Sign Up</a></li> <li><a href="login.php">Log In</a></li> <li role="separator" class="divider"></li> <li><a href="adminlogin.php">Admin</a></li> </ul>';}else{echo '<span class="glyphicon glyphicon-user"></span> '.$_SESSION['loggedInUser'].' <span class="caret"></span></a> <ul class="dropdown-menu"> <li><a href="logout.php">Log Out</a></li> </ul>';}?>
                        
                    </li>
                </ul>
   
            </div>
            
        </div>
      </nav>
<?php

    //session_start();

    //clear all session variables
    //session_unset();

    //destroy the session
    //session_destroy();
    
    //echo "You've logged out! See you next time.<br>";

    //print_r($_SESSION);
include('includes/header.php');
include('includes/premium.php');

?>
<div class="container">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-heart-empty"></span> You've logged out! See you next time.</h1>
            <p class="lead">&ldquo; When you make music or write or create, it’s really your job to have mind-blowing, irresponsible, condomless sex with whatever idea it is you’re writing about at the time. &rdquo;</p>
            
        </div><!-- end .page-header -->
</div>

<?php 

if(isset($_SESSION)){session_unset();
session_destroy();}
    
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
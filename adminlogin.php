<?php

if(isset($_POST['login'])){
    //build a function to validate data
    function validateFormData($formData){
            $formData=trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }


//create variables
//wrap the data with our function
$formName=validateFormData($_POST['adminname']);
$formPass=validateFormData($_POST['adminpassword']);

//connect to database
include('connection.php');

//create SQL query
$query="SELECT username, password FROM admin WHERE username='$formName'";

//store the result
$result=mysqli_query($conn, $query);
    
//verify if result is returned
if(mysqli_num_rows($result)>0){
    
    //store basic user data in variables
    while($row=mysqli_fetch_assoc($result)){
        $user=$row['username'];
        $hashedPass=$row['password'];
    }
    
    //verify hashed password with the typed password
    if($formPass === $hashedPass){
        
        //correct login details!
        //start the session
        session_start();
        
        //store data in SESSION variables
        $_SESSION['loggedInAdmin']=$user;
        
        header("Location: adminpage.php");
    }   else{
        //hashed password didn't verify
        //error message
        $loginError="<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
        
        echo $loginError;
    }
}   else{
    //there are no results in the database
    $loginError="<div class='alert alert-danger'>Login Failed!<a class='close' data-dismiss='alert'>&times;</a></div>";
    
    echo $loginError;
}

//close the mysql connection
mysqli_close($conn);
    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MusiX Admin LogIn</title>
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
  <body id="mypage">
    
      <div class="container">

      <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h2 class="form-signin-heading">MusiX Admin Login</h2>
          
          <br>
          
        <label for="inputUser" class="sr-only">Username:</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Enter your Username" required autofocus name="adminname">
          
          <br>
          
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Enter your Password" required name="adminpassword">
          <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->

      <div class="row"><div id="logo" class="col-xs-12"><p class="text-muted center-block">Copyright  &copy;  2019 MusiX, Inc.</p></div></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
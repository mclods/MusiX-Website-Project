<?php

    session_start();

    if(isset($_POST["delete"])){
        
        if(isset($_POST["dataRadio"])){
            include('connection.php'); 
            $query="DELETE FROM users WHERE id=".$_POST['dataRadio'];
            
            if(mysqli_query($conn, $query)){
                
                echo "<div class='alert alert-success'>User Removed!<a class='close' data-dismiss='alert'>&times;</a></div>"; 
            }
            else{
                echo "Error: ".$query."<br>".mysqli_error($conn);
            }
        }
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

      <div class="page-header">
            <h1><span class="glyphicon glyphicon-lock"></span> MUSIX ADMIN PAGE</h1>
        <hr>
          <h3>Welcome <?php echo $_SESSION['loggedInAdmin'] ?></h3>
            
        </div>
          
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">  
          <?php
            
            include('connection.php'); 

                $query="SELECT * FROM users";
                $results=mysqli_query($conn, $query);
          
          if(mysqli_num_rows($results)>0){
    
                //we have data!
                //output the data
    
                echo "<table class='table table-striped table-bordered table-hover table-condensed table-responsive'><tr><th>Id</th><th>Name</th><th>Email</th><th>Password</th><th>Gender</th><th>DOB</th><th>Phone</th><th>SignUp Date</th><th>Delete</th></tr>";
                

    
                while($row=mysqli_fetch_assoc($results)){
                    
                   
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["gender"]."</td><td>".$row["dob"]."</td><td>".$row["phone"]."</td><td>".$row["signup_date"]."</td><td><input type='radio' name='dataRadio' value='".$row["id"]."'></td></tr>";
                        
                    }
    
                echo "</table>";
    
            }   else{
                echo "<div class='alert alert-danger'>Whoops! No results.</div>";
            }

            mysqli_close($conn);
          
          
          ?>
            <button type="submit" class="btn btn-danger" name="delete">Delete User</button>
            
          </form>
          
          <br><br>
          
          <p><a href="adminlogout.php" class="btn btn-info btn-sm">Log Out</a></p>
          

    </div> <!-- /container -->

      <div class="row"><div id="logo" class="col-xs-12"><p class="text-muted center-block">Copyright  &copy;  2019 MusiX, Inc.</p></div></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
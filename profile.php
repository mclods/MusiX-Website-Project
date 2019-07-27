<?php 
    //session_start();
?>

<?php include('includes/header.php'); ?>
<?php include('includes/premium.php'); ?>

      <div class="container">
          
          <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> Welcome aboard, <?php echo $_SESSION['loggedInUser']; ?>!...</h1>
              <p class="lead">&ldquo; One good thing about music, when it hits you, you feel no pain. &rdquo;</p></div>
              
          
        <p><a href="logout.php" class="btn btn-danger btn-sm">Log Out</a></p>
          
          <hr>
          
          <?php
          
            include('connection.php');
            $query="SELECT name, email, gender, dob, phone, signup_date FROM users WHERE email='".$_SESSION['loggedInEmail']."'";
            $results=mysqli_query($conn, $query);
          
            if(mysqli_num_rows($results)>0){
                echo "<table class='table table-striped table-bordered table-hover table-condensed table-responsive'><tr><th>Name</th><th>Email</th><th>Gender</th><th>DOB</th><th>Phone</th><th>SignUp Date</th></tr>";
                
                while($row=mysqli_fetch_assoc($results)){
                    echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["gender"]."</td><td>".$row["dob"]."</td><td>".$row["phone"]."</td><td>".$row["signup_date"]."</td></tr>";
                }
                echo "</table>";
    
            }   else{
                echo "<div class='alert alert-danger'>Whoops! No results.</div>";
            }

            mysqli_close($conn);
            
          
          ?>
          
        </div>
        <?php include('includes/footer.php');
          
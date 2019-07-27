<?php
 include('includes/header.php'); 

if(isset($_POST['login'])){
    //build a function to validate data
    function validateFormData($formData){
            $formData=trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }


//create variables
//wrap the data with our function
$formEmail=validateFormData($_POST['loginemail']);
$formPass=validateFormData($_POST['loginpassword']);

//connect to database
include('connection.php');

//create SQL query
$query="SELECT name, email, password FROM users WHERE email='$formEmail'";

//store the result
$result=mysqli_query($conn, $query);
    
//verify if result is returned
if(mysqli_num_rows($result)>0){
    
    //store basic user data in variables
    while($row=mysqli_fetch_assoc($result)){
        $user=$row['name'];
        $email=$row['email'];
        $hashedPass=$row['password'];
    }
    
    //verify hashed password with the typed password
    if(password_verify($formPass, $hashedPass)){
        
        //correct login details!
        //start the session
        //session_start();
        
        //store data in SESSION variables
        $_SESSION['loggedInUser']=$user;
        $_SESSION['loggedInEmail']= $email;
        
        header("Location: profile.php");
    }   else{
        //hashed password didn't verify
        //error message
        $loginError="<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
        
        echo $loginError;
    }
}   else{
    //there are no results in the database
    $loginError="<div class='alert alert-danger'>Login Failed!  If you are new user than Sign Up first! <a class='close' data-dismiss='alert'>&times;</a></div>";
    
    echo $loginError;
}

//close the mysql connection
mysqli_close($conn);
    
}

?>


<?php include('includes/premium.php'); ?>

    <div class="container">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-pushpin"></span> Log In to enjoy...</h1>
            <p class="lead">&ldquo; If music be the food of love, play on, Give me excess of it; that surfeiting, The appetite may sicken, and so die. &rdquo;</p>
        </div>
        
        <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          
              <div class="form-group">
                <label for="login-username" class="sr-only">Email</label>
                <div class="input-group">
                <div class="input-group-addon">@</div>
                    <input type="text" class="form-control" id="login-username" placeholder="Email" name="loginemail"></div>
              </div>
              
              <div class="form-group">
                <label for="login-password" class="sr-only">Password</label>
                <div class="input-group">
                        <div class="input-group-addon">**</div>
                    <input type="password" class="form-control" id="login-password" placeholder="Password" name="loginpassword"></div>
              </div>
              
              <button type="submit" class="btn btn-danger" name="login">Login!</button>
              
          </form>
        
        <br><br>
        
        <h3>Fun Fact !!!</h3>
        
        <ul>
            
            <li>There are few activities in life that utilizes the entire brain, and music is one of them.</li>
            
            <li>Playing music regularly will physically alter your brain structure.</li>
            
            <li>Listening to music while exercising can significantly improve your work-out performance.</li>
            
            <li>An emotional attachment could be the reason for your favorite song choice.</li>
            
            <li>Music greatly impacts and boosts our learning capabilities. Listening music, while reading or learning something could trigger the learning and you can memorize the stuff in a better way as compared to be in complete silence.</li>
            
            <li>Music helps to improve your efficiency when you hit the gym for the workout.  Different studies have given many reasons for this.</li>
            
            <li>Researchers found a very amazing fact about music that; heartbeat mimics the musical beats. Our heartbeat, blood pressure and respiration synchronize with musical beats and tempo. It could trigger the heartbeat, blood pressure and nerve contraction and relaxation along with it.</li>
            
            <li>A very disturbing fact revealed by the study of a Sydney-based university that Pop and rock stars die very young as compared to average general people.</li>
            
            <li>In 2011, the Lady Blunt Stradivarius violin was sold for a record price of US$15.9. It holds the world record of the most expensive musical instrument.</li>
            
        </ul>

        
    </div>

<?php include('includes/footer.php'); ?>
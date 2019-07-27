<?php

include('connection.php'); 

$nameError=$emailError=$passwordError=$genderError=$dobError=$phoneError=$name=$email=$password=$gender=$dob=$phone="";

if(isset($_POST["add"])){
        
        //build a function that validates data
        function validateFormData($formData){
            $formData=trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        }
        
        //check to see if inputs are empty
        //create variables with form data
        //wrap the data with our function
        
        if(!$_POST["name"]){
            $usernameError="Please enter your Name <br>";
        }   else{
            $name=validateFormData($_POST["name"]);
        }
        
        if(!$_POST["email"]){
            $emailError="Please enter your Email <br>";
        }   else{
            $email=validateFormData($_POST["email"]);
            $query="SELECT email FROM users where email='$email'";
            $results=mysqli_query($conn, $query);
            if(mysqli_num_rows($results)>0){
                $email="";
                $emailError="This email is not available";
            }
            
        }
    
        if(!$_POST["password"]){
            $passwordError="Please enter your Password <br>";
        }   else{
            $password=password_hash(validateFormData($_POST["password"]), PASSWORD_DEFAULT);
        }
    
        if(isset($_POST["formRadio"])){
            $gender=$_POST["formRadio"];
        }   else{
            $genderError="Please select your Gender";
        }
    
        if(!$_POST["dob"]){
            $dobError="Please enter your DOB";
        }   else{
            $dob=$_POST["dob"];
        }
    
        if(!$_POST["phone"]){
            $phoneError="Please enter your Phone No.";
        }   else{
            $phone=$_POST["phone"];
        }
    
        if($username && $email && $password && $gender && $dob && $phone){
             $query="INSERT INTO users (id, name, email, password, gender, dob, phone, signup_date) VALUES (NULL, '$name', '$email', '$password', '$gender','$dob','$phone', CURRENT_TIMESTAMP)";
    
            if(mysqli_query($conn, $query)){
                echo "<div class='alert alert-success'>Sign Up Successful!<a class='close' data-dismiss='alert'>&times;</a></div>"; 
                
                header("Location: signup.php");
                
            }   else{
                echo "Error: ".$query."<br>".mysqli_error($conn);
            }   
        }
    
    mysqli_close($conn);
        
    }




?>
<?php include('includes/header.php'); ?>
<?php include('includes/premium.php'); ?>

    <div class="container">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-cloud-upload"></span> You're just a click away...</h1>
            <p class="lead">&ldquo; A man should hear a little music, read a little poetry, and see a fine picture every day of his life, in order that worldly cares may not obliterate the sense of the beautiful which God has implanted in the human soul. &rdquo;</p>
        </div><!-- end .page-header -->

        <div class="row">
            <div class="col-sm-6">
                
                <h3>Sign Up</h3>
            
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    
                    <p class="text-danger">* Required Fields</p>
                    
                    <div class="form-group">
                        <label>Name: <small class="text-danger">* <?php echo $nameError; ?></small></label><div class="input-group">
                        <div class="input-group-addon">N</div>
                        <input type="text" placeholder="Enter your Name" class="form-control" name="name"></div>
                    </div>
                    <div class="form-group">
                        <label>Email: <small class="text-danger">* <?php echo $emailError; ?></small></label><div class="input-group">
                        <div class="input-group-addon">@</div>
                        <input type="text" placeholder="Enter your Email" class="form-control" name="email"></div>
                    </div>
                    <div class="form-group">
                        <label>Password: <small class="text-danger">* <?php echo $passwordError; ?></small></label><div class="input-group">
                        <div class="input-group-addon">**</div>
                        <input type="password" placeholder="Enter your Password" class="form-control" name="password"></div>
                    </div>
                    <div class="form-group">
                        <label>Gender: <small class="text-danger">* <?php echo $genderError; ?></small></label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="formRadio" value="Male">Male
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="formRadio" value="Female">Female
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="formRadio" value="Others">Others
                        </label>
                    </div>
                    <div class="form-group">
                        <label>DOB: <small class="text-danger">* <?php echo $dobError; ?></small></label>
                        <div class="input-group">
                        <div class="input-group-addon">12</div>
                            <input type="date" class="form-control" name="dob"></div>
                    </div>
                    <div class="form-group">
                        <label>Phone: <small class="text-danger">* <?php echo $phoneError; ?></small></label><div class="input-group">
                        <div class="input-group-addon">+91</div>
                        <input type="text" placeholder="Enter your Phone" class="form-control" maxlength="10" name="phone"></div>
                    </div>
                    <button type="reset" class="btn btn-warning">Cancel</button>
                        
                    <button type="submit" class="btn btn-primary" name="add">Submit</button>
                </form>
                
                <br><br><br>
            
            </div>
            
            <div class="col-sm-6">
                
                
            
            </div>
        </div><!-- end .row -->
</div>

<?php include('includes/footer.php'); ?>
<?php

include('connection.php'); 

$query="SELECT * FROM songs";
$results=mysqli_query($conn, $query);

?>

<?php include('includes/header.php'); ?>
<?php include('includes/premium.php'); ?>

    <div class="container">
        
         <div class="page-header">
            <h1><span class="glyphicon glyphicon-save"></span> Downloads</h1>
            <p class="lead">Get our awesome content...</p>
         </div><!-- end .page-header -->

        <?php
          
            if(mysqli_num_rows($results)>0){
    
                //we have data!
                //output the data
    
                echo "<table class='table table-striped table-bordered table-hover table-condensed table-responsive'><tr><th>Song Name</th><th>Download</th></tr>";
                
                $flag=0;
    
                while($row=mysqli_fetch_assoc($results)){
                    
                    if($flag==0){
                        
                        $flag=1;
                        echo "<tr class='success'><td>".$row["name"]."</td><td><a href='".$row["path"]."'>Get this Song!</a></td></tr>";
                        
                        }   else{
                        
                        $flag=0;
                        echo "<tr class='danger'><td>".$row["name"]."</td><td><a href='".$row["path"]."'>Get this Song!</a></td></tr>";
                        
                    }
                    }
    
                echo "</table>";
    
            }   else{
                echo "<div class='alert alert-danger'>Whoops! No results.</div>";
            }

            mysqli_close($conn);

          ?>
        
        <br><br><br>

    </div>

<?php include('includes/footer.php'); ?>
<?php
    session_start();
    if(isset($_SESSION['uemail']))
    {
       header('location:home.php'); 
    }      
    include('DBcon.php');
        
            if(isset($_POST['submit']))
            {

                function valid($data)
                {
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                function is_valid_passwords($pwd,$cpwd) 
                {
                   if ($pwd != $cpwd) 
                   {
                         return false;
                     }
                     return true;
                }
            
                $email = valid( $_POST["mail"] );
                $fname = valid( $_POST["fname"] );
                $lname = valid( $_POST["lname"] );
                $pwd=$_POST['pwd'];
                $cpwd=$_POST['cpwd'];
                $status= $_POST['status'];
                if(is_valid_passwords($pwd,$cpwd))
                {
                    
                    $query="INSERT INTO `user`(`email`,`fname`, `lname`, `designation`, `password`)
                        VALUES ('$email','$fname','$lname','$status','$pwd');
                        ";
                    $retval = mysqli_query($conn,$query );
                    if($retval==true ) 
                    {
                    header('location:login.php');
                    }
                    else
                    {?>
                    <script>
                        alert("This Email Id is already Registered.Try Again with a new Email ID");
                    </script>
                        <?php
                    }
                }
                else
                    {
             ?>
                    <script>
                    alert ("Password doesnot match,Please Try Again!!");
                    </script>
    <?php
                    }
            mysqli_close($conn);
              
            }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>TechHub</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" href="images/logo.PNG" >
    
    </head>
    <body id="_6" >
        <!-- navigation bar -->
  
        <!-- content -->
        <div id="content" style="overflow:hidden;">

            <div id="sf">
                <form  action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
                <center>
                    <div class="heading">
                        <img src="images/logo.PNG">
                        <h1>Learn & Grow</h1>
                    </div>
                        <input name="mail" id="user" type="text" placeholder="Enter your email id" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" title="Format: xxx@xxx.xxx)" autocomplete="off" required>
                        <input name="fname" id="user" type="text"  placeholder="Enter your first name" pattern="[A-Za-z]{2,}" title="Name must contain atleast 2 alphabets" autocomplete="off" required>
                        <input name="lname" id="user" type="text"  placeholder="Enter your last name" pattern="[A-Za-z]{2,}" title="Name must contain atleast 2 alphabets" autocomplete="off" required>
                        
                         <input name="pwd" id="key" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Create a Strong Password" autocomplete="off" required>
                        <input name="cpwd" id="key" type="password" title="Re enter your password" placeholder="Confirm password" required>
                        
                        <h4><strong><input type="radio" name="status" value="Student" checked>Student</strong>
                        <strong><input type="radio" name="status" value="Expert">Expert</strong><br></h4>
                                                      
                        <br>
                          
                        <div id="button-block">
                            <center>
                                <input type="submit" class="btn btn-primary" name="submit" value="Registration">
                              
                            </center>
                        </div>
                    </form>
                </center>
            </div>
            
            <div id="ta">
                <h1>Thank You For Registering With Us.</h1>
            </div>
            
        </div>
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>
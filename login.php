<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['uemail']))
    {
       header('location:home.php'); 
    }
?>
<html>
    <head>
        <title> TechHub </title>
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/logo.png" >
    </head>
        <!-- content -->
        <div id="content">
                <center>
                    <div class="heading">
                        <img src="images/logo.PNG">
                        <br>
                        <br>
                        <h1>Learn & Grow</h1>
                    </div>
                    
                <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">
                    <input name="email" id="user" type="text" title="Email ID" placeholder="User ID" autocomplete="off" required>
                    <input name="password" id="key" type="password" title="Password" placeholder="Password" autocomplete="off" required>
                    <i class="material-icons" id="lock">lock</i>
                    <i class="material-icons" id="person">person</i>
                    <div id="button-block">
                        <center>
                             <h6><input type="submit" name="submit" class="btn btn-primary" value="Login"/>
				            <a href="Forgetpwd.php"> Forgot password ?</a></h6>
				            <h5><a href="registration.php">Create an account</a></h5>
                        </center>
                    </div>
                </form>
            </center>
        </div>
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    
</html>
<?php
    include('DBcon.php');
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pwd=$_POST['password'];
		$query="SELECT * FROM `user` WHERE `email`='$email' and `password`='$pwd'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_num_rows($result);
		if($row<1)
		{
?>
			<script>
			alert("Email and Password Not Matched, Try Again!!");
			window.open('login.php','_self');
			</script>
<?php
		}
		else
		{
			$data=mysqli_fetch_assoc($result);
			$email=$data['email'];
            $designation=$data['designation'];
			$_SESSION['uemail']=$email;
            if($designation=='Admin')
                header('location:admin_dash.php');
            else
               header('location:home.php');
		}
	}
?>


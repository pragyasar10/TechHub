<?php
include ('DBcon.php');
include ('function.php');
	
if(isset($_POST['submit']))
{
	$uemail = $_POST['uemaill'];
    $conn=mysqli_connect('localhost','root','','discussion_db');
	$uemail = mysqli_real_escape_string($conn,$uemail);
	if(checkUser($uemail) == "true")
	{
		$userID = UserID($uemail);
		$token = generateRandomString();
        $q="INSERT INTO recovery_keys(userID, token) VALUES ('$userID','$token')";
		$query = mysqli_query($conn,$q);
		if($query)
		{
			 $send_mail = send_mail($uemail, $token);

			 if($send_mail === 'success')
			 {
				 $msg = 'A mail with a new password has been sent to your email. Kindly Check your mail and Login again :)';
				 $msgclass = 'bg-success';
			 }
             else
             {
				$msg = 'Something is wrong.';
				$msgclass = 'bg-danger';
			 } 
		}
        else
		{
            $msg = 'There is something wrong.';
            $msgclass = 'bg-danger';
		}
		
	}
    else
	{
		$msg = "Ooops!!This email doesn't exist in our database. Enter the registered Email ID and then try again.";
        $msgclass = 'bg-danger';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TechHub</title>
<link rel="icon" href="images/icon.png">
<link href="css/bootstrap.css" rel="stylesheet">
 <style type="text/css">
           body{ background-image: url("background1.jpg");
                background-repeat: no-repeat;
                background-size: cover;}

        </style>   
</head>
<body>

<div class="container">
	<div class="row">

    	<div class="col-lg-4 col-lg-offset-4">
        

        	<form class="form-horizontal" role="form" method="post">
			    <h2 align="center">Forgot Password</h2>

				<?php if(isset($msg)) {?>
                    <div class="<?php echo $msgclass; ?>" style="padding:5px;"><?php echo $msg; ?></div>
                <?php } ?>

                <p>
                    Forgot your password? No problem, we will fix it. Just type your email below and we will send you a new password to your email. Follow easy steps to get back to your account. Later on, You can simply go to your 'My Profile' and update your password :) Keep Exploring!!
                </p>
    
                <div class="row">
                    <div class="col-lg-12">
                    <label class="control-label">Your Email</label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control" name="uemaill" type="email" placeholder="Enter your email here(Format:xxx@xxx.xxx)" autocomplete="off" required>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success btn-block" name="submit" style="margin-top:8px;">Submit</button>
                    </div>
                </div>
			</form>
		</div>
	</div>
    </div>   

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
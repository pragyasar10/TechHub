<?php

include ('DBcon.php');
include ('function.php');
include ('Forgetpwd.php');

$uemail = $_POST['email'];
$token = $_POST['token'];

$userID = UserID($uemail); 

$verifytoken = verifytoken($userID, $token);

if(isset($_POST['submit']))
{
	$new_password = $_POST['new_password'];
	$new_password = md5($new_password);
	$retype_password = $_POST['retype_password'];
	$retype_password = md5($retype_password);
	
	if($new_password == $retype_password)
	{
        $conn=mysqli_connect('localhost','root','','discussion_db');
		$update_password = mysqli_query($conn, "UPDATE users SET password = '$new_password' WHERE uid = $userID");
		if($update_password)
		{
				mysqli_query($conn, "UPDATE recovery_keys SET valid = 0 WHERE userID = $userID AND token ='$token'");
				$msg = 'Your password has been changed successfully. Please login with your new password.';
				$msgclass = 'bg-success';
		}
	}else
	{
		 $msg = "Password did not match,Try Again!!";
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
<link href="css/bootstrap.css" rel="stylesheet">
    
</head>
<body>

<div class="container">
	<div class="row">
   
	<?php if($verifytoken == 1) 
    {
        ?>
    	<div class="col-lg-4 col-lg-offset-4">
        

        	<form class="form-horizontal" role="form" method="post">
			    <h2>Reset Your Password</h2>

				<?php if(isset($msg)) 
                { ?>
                    <div class="<?php echo $msgclass; ?>" style="padding:5px;"><?php echo $msg; ?></div>
                <?php } ?>
    
                <div class="row">
                    <div class="col-lg-12">
                    <label class="control-label">New Password</label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control" name="new_password" type="password" placeholder="New Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <label class="control-label">Re-type New Password</label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control" name="retype_password" type="password" placeholder="Re-type New Password" required>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success btn-block" name="submit" style="margin-top:8px;">Submit</button>
                    </div>
                </div>
			</form>
		</div>
        
        <?php }else {?>
	    	<div class="col-lg-4 col-lg-offset-4">
   		       	<h2>Invalid or Broken Token</h2>
	            <p>Opps! The link you have come with is maybe broken or already used. Please make sure that you copied the link correctly or request another token from <a href="Forgetpwd.php">here</a>.</p>
			</div>
        <?php }?>

	</div>
    
  
</div>    
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

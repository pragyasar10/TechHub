<?php

function checkUser($email)
{
	global $conn;
	$conn=mysqli_connect('localhost','root','','discussion_db');
	$query = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

	if(mysqli_num_rows($query) > 0)
	{
		return 'true';
	}else
	{
		return 'false';
	}
}

function UserID($email)
{
	global $conn;
	$conn=mysqli_connect('localhost','root','','discussion_db');
	$query = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
	$row = mysqli_fetch_assoc($query);
	
	return $row['email'];
}


function generateRandomString($length = 8) 
{
    
	$characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return ($randomString);
}

function send_mail($to, $token)
{
	require 'PHPMailer/PHPMailerAutoload.php';
	
    global $conn;
	$conn=mysqli_connect('localhost','root','','discussion_db');
    
	$mail = new PHPMailer;
	
	$mail->isSMTP();
    $mail->SMTPDebug=0;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'techhubweb@gmail.com';
	$mail->Password = 'password1234!';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->From = 'techhubweb@gmail.com';
	$mail->FromName = 'TechHub';
	$mail->addAddress($to);
	$mail->addReplyTo('techhubweb@gmail.com', 'Reply');
	$mail->isHTML(true);

	$mail->Subject = 'TechHub: Password Recovery Instruction';
	//$link = 'http://localhost/TechHub/recovery.php?email='.$to.'&token='.$token;
	$mail->Body    = "<b>Hello</b><br><br>You have requested for your password recovery.This is your one time password. $token";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		return 'fail';
	}
    else {
        $query = mysqli_query($conn,"UPDATE user SET password = '$token' WHERE email='$to'");
		return 'success';
	}
}

function verifytoken($userID, $token)
{	
	global $conn;
	$conn=mysqli_connect('localhost','root','','discussion_db');
	
	$query = mysqli_query($conn,"SELECT valid FROM recovery_keys WHERE userID = $userID AND token = '$token'");
	$row = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query) > 0)
	{
		if($row['valid'] == 1)
		{
			return 1;
		}else
		{
			return 0;
		}
	}else
	{
		return 0;
	}
	
}
?>
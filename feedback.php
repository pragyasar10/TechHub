<!doctype>
<?php
    session_start();
    include('navbar.html');
    if(!isset($_SESSION['uemail']))
    {
        header('location:index.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link rel='icon' href='https://qsfo.fs.quoracdn.net/-3-images.favicon.ico-26-ae77b637b1e7ed2c.ico' />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Feedback Form</title>
        <style>
            .contact-title
            {
                margin-top: 100px;
                color: black;
                text-transform: uppercase;
                transition: all 4s ease-in-out;
            }
            .form-control
            {
                width: 600px;
                background: transparent;
                border: none;
                outline: none;
                border-bottom: 1px solid gray;
                color: black;
                font-size: 18px;
                margin-bottom: 16px;
            }
            input
            {
                height: 45px;
            }
            form .submit
            {
                background: #ff5722;
                border-color: transparent;
                color: black;
                font-size: 20px;
                font-weight: bold;
                letter-spacing: 2px;
                height: 50px;
                margin-top: 20px;
            }
            form .submit:hover
            {
                background-color: #f44336;
                cursor: pointer;
            }
        </style>
    </head>
    <body style="margin: 0;
    padding: 0;
    text-align: center;
    background: url(b3.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;">
        <div class="contact-title">
          <h2><b>We are always here to serve you!!</b></h2><br>  
        </div>
        <div class="contact-form" align="center">
            <form id="contact-form" method="post">
                <input name="name" type="text" class="form-control" placeholder="Enter your Full name" pattern="[a-zA-Z]+[ ][a-zA-Z]+" title="Complete Name with a space in between and it must contain atleast 2 alphabets"autocomplete="off" required>
                <br> 
                 <!--input name="email" type="email" class="form-control" placeholder="Enter your email" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" title="Format: xxx@xxx.xxx)" autocomplete="off" required-->
                <!br>
                <textarea name="feedback" class="form-control" placeholder="Write feedback here" row="4"  required></textarea>
                <br>
                <input type="submit" class="btn btn-primary"name="submit" value="Send Feedback">
            </form>
        </div>
    </body>
</html>

<?php

if(isset($_POST['submit']))
{
    require 'PHPMailer/PHPMailerAutoload.php';	
	$mail = new PHPMailer;
	$mail->isSMTP();
    $mail->SMTPDebug=0;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'techhubweb@gmail.com';
	$mail->Password = 'password1234!';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
    $mail->From = ($_SESSION['uemail']);
	//$mail->From = ($_POST['email']);
	$mail->FromName = ($_POST['name']);
	$mail->addAddress('techhubweb@gmail.com');
	$mail->isHTML(true);
	$mail->Subject = 'FEEDBACK';
	$mail->Body = ($_POST['feedback']);
	if(!$mail->send())
    {
		return 'fail';
	}
    else 
    {
        ?>
        <script>
            alert("Thank you for the feedback");
        </script>
        <?php
		return 'success';
	}
}
?>


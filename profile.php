<!doctype>
<?php
    session_start();
    include('navbar.html');
    if(!isset($_SESSION['uemail']))
    {
        header('location:index.php');
    }
?>
<html lang="en_us">
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link rel='icon' href='https://qsfo.fs.quoracdn.net/-3-images.favicon.ico-26-ae77b637b1e7ed2c.ico' />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include('DBcon.php');
            $email=$_SESSION['uemail'];
            $qry="SELECT * FROM `user` WHERE `email`='$email';";
            $run=mysqli_query($conn,$qry);
            $data=mysqli_fetch_assoc($run);?>
            <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-8 d-block">
                    <form class="form-container" method="POST" action="ask_question.php">
                        <h3><?php echo "Username: ". $data['fname']." ".$data['lname'];?></h3>
                        <h3><?php echo "Status: ".$data['designation'];?></h3>
                        <h3><?php echo "Email: ".$data['email'];?></h3>
                        <b><a style="text-decoration:none; font-size: 18px; " href="change_pwd.php">Change password</a></b>

                    </form>
                </div>
            </div>
    </body>
</html>
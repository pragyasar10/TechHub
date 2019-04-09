<!Doctype>
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
        <title>TechHub</title>
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
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-8 d-block">
                    <form class="form-container" method="POST" action="change_pwd.php">
                        <div class="form-group">    
                            <label>Write your existing password</label> 
                            <input type="password" class="form-control" autocomplete="off" name="epwd" required="">
                        </div>

                        <div class="form-group">    
                            <label>Write your new password</label> 
                            <input type="password" class="form-control" name="npwd" autocomplete="off" required><br>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="Change Password" name="submit" > 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    include('dbcon.php');
    if(isset($_POST['submit']))
    {
        $email=$_SESSION['uemail'];
        $epwd=$_POST['epwd'];
        $npwd=$_POST['npwd'];
        $qry="SELECT `password` FROM `user` WHERE `email`= '$email';";
        $result=mysqli_query($conn,$qry);
        $data=mysqli_fetch_assoc($result);
        if($data['password'] == $epwd)
        {
            $qry1="UPDATE `user` SET `password`='$npwd' WHERE `email`= '$email';";
            $result1=mysqli_query($conn,$qry1);
            if($result1)
            {
                ?>
                <script>
                alert("password is updated");
                </script>
                <?php
            }
            else
            {
            ?>
            <script>
            alert("sql error");
            </script>
            <?php
                
            }
        }
        else
        {
            ?>
            <script>
            alert("Wrong password entered");
            </script>
            <?php
            
        }
    }
    ?>
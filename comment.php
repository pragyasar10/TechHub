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
        <link rel="icon" href="images/icon.png">
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
            if(isset($_POST['submit']))
            {
                $cont=$_POST['com_cont'];
                $ans_id=$_POST['ans_id'];
                $cat_id=$_POST['cat_id'];
                $email=$_SESSION['uemail'];
                $qry1="INSERT INTO `comment`( `email`, `ans_id`, `content`) VALUES ('$email',$ans_id,'$cont')";
                $result1=mysqli_query($conn,$qry1);
                if($result1)
                {
                    ?>
                    <h1 align="center">Your Comment has been posted Successfully!!</h1>
                    <?php
                }
                else
                {
                    ?>
                        <h1 align="center">Ooops!! <br> There was some error.</h1>
                    <?php
                }
                ?>
                <h3 align="center"><a href="question_display.php ? id=<?php echo $cat_id; ?>">BACK</a></h3> 
                <?php
            }
            else
            {
                $ans_id=$_GET['id1'];
                $cat_id=$_GET['id2'];
                $qry="SELECT `content` FROM `answer` WHERE `ans_id`=$ans_id";
                $result=mysqli_query($conn,$qry);
                $data=mysqli_fetch_assoc($result);
                ?>
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-8 d-block">
                            <form class="form-container" method="POST" action="comment.php">
                                <div class="form-group">
                                    <input type="hidden" name="ans_id" value="<?php echo $ans_id; ?>">
                                    <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                                    <h3><?php echo $data['content'] ?></h3>
                                </div>
                                <div class="form-group">
                                    <textarea rows="5" cols="55" placeholder="Write your comment" name="com_cont" required></textarea><br>
                                </div>
                                <input type="submit" class="btn btn-success" id="submit" value="Comment" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div align="center">
                <div  style="background-color: white; width: 800px; border: 2px solid gray; padding: 25px; margin: 25px;">
                    <?php
                    $qry2="SELECT `content`,`email` FROM `comment` WHERE `ans_id`=$ans_id; ";
                    $result2=mysqli_query($conn,$qry2);
                    while($data2=mysqli_fetch_assoc($result2))
                    {
                        $mail=$data2['email'];
                        $qry3="SELECT `fname`, `designation` FROM `user` WHERE `email` = '$mail';";
                        $result3=mysqli_query($conn,$qry3);
                        $data3=mysqli_fetch_assoc($result3);
                        ?>
                        
                            <h5 align="left" style="font-weight: 50;"><?php echo $data3['fname'] . ":".$data3['designation'];?></h5><h4 align="left"><i><?php echo $data2['content'];?></i></h4>
                        
                        <?php
                    }
                    ?>
                </div>
            </div>
                <?php
            }
            ?>
	</body>
</html>
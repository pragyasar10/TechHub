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
        <link rel="stylesheet" href="style1.css">
        <link rel='icon' href='https://qsfo.fs.quoracdn.net/-3-images.favicon.ico-26-ae77b637b1e7ed2c.ico' />
		<title>TechHub</title>
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
            $email=$_SESSION['uemail'] ;
            {
                $id=$_GET['id'];
                $qry1="SELECT `ques_id`,`content` FROM `question` WHERE `cat_id`=$id order by `ques_id` DESC; ";
                $result1=mysqli_query($conn,$qry1);
                while($data1=mysqli_fetch_assoc($result1))
                {
                    ?>
                    <div align="center">
                        <div align="left" style="background-color: white; width: 800px; border: 2px solid gray; padding: 25px; margin: 25px;">
                            <h4><b><?php echo "Q. ".$data1['content'];?></b></h4>
                            <h6><a style="text-decoration:none; font-size: 16px; "href="ans_qry.php ? id1=<?php echo $data1['ques_id'];?> & id2=<?php echo $id;?>">Write your Answer</a></h6><br>
                            <?php
                            $idd=$data1['ques_id'];
                            $qry2="SELECT `ans_id`,`content`,`email`,`upvotes` FROM `answer` WHERE `ques_id`=$idd";
                            $result2=mysqli_query($conn,$qry2);
                            while($data2=mysqli_fetch_assoc($result2))
                            {
                                $mail=$data2['email'];
                                $qry3="SELECT `fname`, `designation` FROM `user` WHERE `email` = '$mail';";
                                $result3=mysqli_query($conn,$qry3);
                                $data3=mysqli_fetch_assoc($result3);
                                ?>
                                <h5 style="font-weight: 50;"><?php echo $data3['fname'] . ":".$data3['designation'];?></h5><h4><span style='font-size:30px;'>&#8594;</span><?php echo " ".$data2['content'];?></h4>
                                <?php echo $data2['upvotes'] . " Upvotes ";?>
                                <a style="text-decoration:none; font-size: 16px; " href="comment.php ? id1=<?php echo $data2['ans_id']; ?>& id2=<?php echo $id;?>">Comment</a><br>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </body>
</html>


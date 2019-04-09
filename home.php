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
            if(isset($_POST['submit']))
            {
                $ans_id=$_POST['ans_id'];
                $qry1="SELECT `email`, `ans_id` FROM `liked` WHERE `email`='$email' AND `ans_id`= $ans_id ;";
                $result1=mysqli_query($conn,$qry1);
                if(!$data1=mysqli_fetch_assoc($result1))
                {
                    $qry2="SELECT `upvotes` FROM `answer` WHERE `ans_id`=$ans_id; ";
                    $result2=mysqli_query($conn,$qry2);
                    $data2=mysqli_fetch_assoc($result2);
                    $upvotes=$data2['upvotes'] + 1;

                    $qry3="UPDATE `answer` SET `upvotes`= $upvotes WHERE `ans_id`=$ans_id";
                    $result3=mysqli_query($conn,$qry3);
                    
                    $qry4="INSERT INTO `liked`(`email`, `ans_id`) VALUES ('$email', '$ans_id')";
                    $result4=mysqli_query($conn,$qry4);
                }
                ?>
                <script >
                    window.open("home.php","_self");
                </script>
                <?php
            }
            else
            {
                $qry="SELECT `ques_id`,`content` FROM `question` order by `ques_id` DESC; ";
                $result=mysqli_query($conn,$qry);
                while($data=mysqli_fetch_assoc($result))
                {
                    ?>
                    <div align="center">
                        <div align="left" style="background-color: white; width: 800px; border: 2px solid gray; padding: 25px; margin: 25px;">
                            <h4><b><?php echo "Q.  ".$data['content'] . " ";?></b><a style="text-decoration:none; font-size: 13px;" href="view_details.php ? id=<?php echo $data['ques_id'] ?>">View Details</a></h4>
                            <?php
                            $idd=$data['ques_id'];
                            $qry1="SELECT `ans_id`,`content`,`email`,`upvotes` FROM `answer` WHERE `ques_id`=$idd";
                            $result1=mysqli_query($conn,$qry1);
                            $f=0;
                            while($data1=mysqli_fetch_assoc($result1))
                            {
                                $f=1;
                                $mail=$data1['email'];
                                $qry2="SELECT `fname`, `designation` FROM `user` WHERE `email` = '$mail';";
                                $result2=mysqli_query($conn,$qry2);
                                $data2=mysqli_fetch_assoc($result2);
                                ?>
                                <h5 style="font-weight: 50;"><?php echo $data2['fname'] . ":".$data2['designation'];?></h5><h4><span style='font-size:30px;'>&#8594;</span><?php echo " ".$data1['content'];?></h4>
                                <?php echo $data1['upvotes'];?>
                                <form method="post" action="home.php">
                                    <input type="hidden" name="ans_id" value="<?php echo $data1['ans_id']; ?>">
                                    <input type="submit" name="submit" value="Upvote"/>
                                </form>
                                <?php
                            }
                            if($f==0)
                            {
                                echo "Not answered yet";
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
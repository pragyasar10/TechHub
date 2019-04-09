<!Doctype>
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
                $cont=$_POST['ans_cont'];
                $ques_id=$_POST['q_id'];
                $cat_id=$_POST['cat_id'];
                $email=$_SESSION['uemail'];
                $qry="INSERT INTO `answer`( `email`, `ques_id`, `content`) VALUES ('$email',$ques_id,'$cont')";
                $result1=mysqli_query($conn,$qry);
                if($result1)
                {
                    ?>
                        <h1 align="center">Your answer has been posted Successfully</h1>
                        <h3 align="center"><a href="question_display.php ? id=<?php echo $cat_id; ?>">BACK</a></h3>  
                    <?php
                }
                else
                {
                    ?>
                    <h1 align="center">Ooooops!!<br> There was some error in posting your Answer<./h1>
                    <h3 align="center"><a href="question_display.php ? id=<?php echo $cat_id; ?>">BACK</a></h3>  
                    <?php
                }
            }
            else
            {
                $ques_id=$_GET['id1'];
                $cat_id=$_GET['id2'];
                $qry="SELECT `content` FROM `question` WHERE `ques_id`=$ques_id";
                $result=mysqli_query($conn,$qry);
                $data=mysqli_fetch_assoc($result);
            
                ?>
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-8 d-block">
                            <form class="form-container" method="POST" action="ans_qry.php">
                                <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                                <div class="form-group">
                                    <input type="hidden" name="q_id" value="<?php echo $ques_id; ?>">
                                    <h3><b><?php echo "Q.  " .$data['content'] ?></b></h3>
                                </div>
                                <div class="form-group">
                                    <textarea rows="5" cols="55" placeholder="Write your answer...." name="ans_cont" required></textarea><br>
                                </div>
                                <input type="submit" class="btn btn-success" id="submit" value="Submit" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
    </body>
</html>
<!doctype>
<?php
    session_start();
    include('navbar.html');
    if(!isset($_SESSION['uemail']))
    {
        header('location:index.php');
    }
    include('dbcon.php');
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
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-8 d-block">
                    <form class="form-container" method="POST" action="ask_question.php">
                        <div class="form-group">    
                            <label><span class="glyphicon glyphicon-pencil"></span>Write your Question</label> 
                            <textarea rows="5" cols="55" class="form-control" name="content" autocomplete="off" required></textarea><br>
                        </div>

                        <div class="form-group">    
                            <label><span class="glyphicon glyphicon-pencil"></span>Subtopic</label> 
                            <input type="text" class="form-control" name="subtopic" autocomplete="off" required><br>
                        </div>

                        <div class="form-group">    
                            <label><span class="glyphicon glyphicon-user"></span>Choose category</label> 
                            <select name="category">
                                <?php  
                                    $qry="SELECT `cat_id`, `cat_name` FROM `category`;";
                                    $result=mysqli_query($conn,$qry);
                                    while($data=mysqli_fetch_assoc($result))
                                    {?>
                                        <option value=<?php echo $data['cat_id'];?> ><?php echo $data['cat_name']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="Post" name="submit"> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    
   if(isset($_POST['submit']))
	{
        $email=$_SESSION['uemail'];
        $cont=$_POST['content'];
       // date_default_timezone_set();
       // $datetime=date("m/d/Y h:i:s");
        $cat_id=$_POST['category'];
        $subtopic=$_POST['subtopic'];
        $qry="INSERT INTO `question`(`email`, `cat_id`, `subtopic`, `content`) VALUES ('$email','$cat_id','$subtopic','$cont');";
        $retval = mysqli_query($conn,$qry);
        if($retval==true ) 
        {
            ?>
            <script>
                alert("Question Posted successfully");
                window.open('home.php','_self');
            </script>
            <?php
        }
        else
        {
           echo"Error..".mysql_error();
        }
        mysql_close($conn);
   }
?>
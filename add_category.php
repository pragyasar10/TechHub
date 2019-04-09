<!Doctype>
<?php
    session_start();
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
        <div class="container-fluid ">
            <div class="row">
                <div align="center" class="col-lg-8 d-block">
                    <form method="post" action="add_category.php" class="form-container">
                        <div class="form-group"> 
                             <h3>Enter the name of category</h3>
                        </div>
                        <div class="form-group"> 
                        <input type="text" name="cname" required><br>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    include('DBcon.php');
	if(isset($_POST['submit']))
	{
        $cname=$_POST['cname'];
        $qry="INSERT INTO `category`(`cat_name`) VALUES ('$cname');";
        if(mysqli_query($conn,$qry ))
        {
            ?>
            <script>
            alert("Category Added Successfully!");
            </script>
            <?php
             header('location:home.php');
        }
        mysql_close($conn);
    }
?>
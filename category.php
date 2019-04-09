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
        <div class="container">
          <div class="row">
        <?php
            include('DBcon.php');
            $pic = array('###','data_structure.png','algorithm.png','toc.png','network.png','oop.png','c.png','c++.png','java1.png','html1.png','dbms.png','python1.png','ml.png','tech.jpg','tech2.jpg');
            $qry="Select * from category";
            $result=mysqli_query($conn,$qry);
            $i=0;
            while($data=mysqli_fetch_assoc($result))
            {
                $i=$i+1;
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4" >
                        <a href="question_display.php ? id=<?php echo $i; ?>"><?php echo" <li style=\"display:inline;\"><img src=\"$pic[$i]\" width=\"250\" height=\"250\"></li>";?><div style=" position: absolute; top: 50%; left: 50%;
                        transform: translate(-50%, -50%);"></div></a>
                </div> 
                <?php
            }
        ?>
            </div>
        </div>
    </body>
</html>
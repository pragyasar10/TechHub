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
        <!--link rel="stylesheet" type="text/css" href="style1.css"-->
        <link rel='icon' href='https://qsfo.fs.quoracdn.net/-3-images.favicon.ico-26-ae77b637b1e7ed2c.ico' />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            body { background-image: url("b1.jpg");
                
                background-size: cover;
       }
        </style>
	</head>
	<body>
        <div align="center">
            <h1><b>WELCOME TO ADMIN DASHBOARD</b></h1>
        </div>
        <div>
            <h2 align="center">
            <a href="add_category.php">Add Category</a><br>
        </div>
	</body>
</html>

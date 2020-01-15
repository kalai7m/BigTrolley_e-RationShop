<?php
    if(!isset($_COOKIE['logged']))
    {
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../user/a.ico">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>BigTrolley</title>
    <style>
    a{
        text-decoration:none;
        color: white;
    }
    .back11{
    background: url('image/bg6.jpg') no-repeat;
    height: 100vh; 
        margin-top:0;
        /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    .center{
        margin-top:500px;
    }
    </style>
</head>
<body class="back11">
    <div class="container-fluid ">
        <div >
    <center><h1 style="margin-top:300px;color:white;">Successfully signed Up</h1>
    <a href="login.php" style="font-size:37px;">Login</a>
</center>
</div>
</div>
</body>
</html>
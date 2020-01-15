<?php
    session_start();
    $conn=mysql_connect("localhost","root","") or die("Could not connect");
    $selected=mysql_select_db("bigt",$conn);
    $user=$_POST['rno'];
    $pass=$_POST['passwrd'];

    $user=stripslashes($user);
    $pass=stripslashes($pass);
    echo $user;
    echo $pass;
    
    $sql="SELECT * FROM signup WHERE rationno='$user' AND pwd='$pass'";
    $result=mysql_query($sql);
    $c=mysql_num_rows($result);
    echo $c;
    if($c==1)
    {
        $sec= 5 + time();
        setcookie(logincook,date("F jS - g:i a"),$sec);
        header("location: ../examples/dashboard.php");
        $_SESSION['login']=$user;
    }
    else
    {
        $_SESSION['er']="Denied";
        header("location:login.php");
    }

?>
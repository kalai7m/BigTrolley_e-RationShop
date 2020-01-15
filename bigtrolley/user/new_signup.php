<?php
     
    session_start();
    $rat=$_SESSION['newra'];
    $r=$_SESSION['nra'];
    echo $rat;
    echo $r;

    $conn=mysql_connect("localhost","root","") or die("Could not connect");
    $selected=mysql_select_db("bigt",$conn);

    if(isset($_POST['user']) && isset($_POST['pass'])){
        $usr=$_POST['user'];
        $passwd=$_POST['pass'];
        echo $usr;
        echo $passwd;

        $sql="INSERT INTO signup(username,pwd,rationno) VALUES ('$usr','$passwd','$r')";
        $sql1="UPDATE ration SET signupflag='Y' where rationno='$r'";

            if(mysql_query($sql) && mysql_query($sql1)){
                $sec= 5+ time();
                setcookie(logged,date("F jS - g:i a"),$sec);
                header("location: hello.php");
            }
            else{
                echo "Could not insert : ".mysql_error($conn);
            }
    }

    mysql_close($conn);
    session_destroy();
?>
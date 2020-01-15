<?php
session_start();

$conn=mysql_connect("localhost","root","") or die("Connection failed");

$selected = mysql_select_db("bigt" , $conn);
$ratno= $_POST['r'];
$_SESSION['ra']=$ratno;
$ratno=stripslashes($ratno);

$sql="SELECT * FROM ration WHERE rationno = '$ratno' AND signupflag NOT IN ('Y')";

$result=mysql_query($sql);
$c=mysql_num_rows($result);



if($c==1)
{
  while($row=mysql_fetch_array($result))
  {
    $ano=$row['aadharno'];
  }
  $_SESSION['aadhar']=$ano;
  mysql_close($conn);
    $sec = 5 + time();
    setcookie(loggedin,date("F jS - g:i a"),$sec);
    header("location:signupreal.php");
}
else{
  $_SESSION['er']="Already have an account";
  mysql_close($conn);
  header("location:signup.php");
}

?>
<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bigt");
//$orderid=$_GET["id"];
$orderid=$_SESSION["oid"];
$ran=$_SESSION["rr"];

foreach($_COOKIE['item'] as $name1 => $value)
{
    echo $orderid;
echo $ran;
    $values11=explode("__",$value);
    echo $values11[1];
    mysqli_query($link,"insert into confirm_order_product values('','$orderid','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]',curdate(),'$ran')");
}
echo "Your orders will be packed soon.";

?>
<script type="text/javascript">
    setTimeout(function(){
        window.location="successpage.php";
    },3000);
</script>

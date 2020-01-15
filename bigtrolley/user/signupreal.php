
<?php
    if(!isset($_COOKIE['loggedin'])){
        header("location:signup.php");
    }
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--CSS stylesheet-->
    <link rel="stylesheet" href="signuprealstyle.css">
     
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="a.ico">
    <title>Signup-Big-Trolley</title>

    <style>
    .wronginput{
    border-bottom: 1px solid red;
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    }
    .wronginput i{
    width: 26px;
    float: left;
    text-align: center;
    }
    .wronginput input{
    border: none;
    outline: none;
    background: none;
    color: white;
    font-size: 18px;
    float: left;
    margin: 0 10px;
    }
    .error{
    color: red;
    }
    </style>
</head>
<body>
    <form class="" action="new_signup.php" name="mf" method="post" onsubmit="return valida()">
    <div class="login-box">
        <h1>Hello 

        <?php
            $conn=mysql_connect("localhost","root","") or die("Connection failed");

            $selected = mysql_select_db("bigt", $conn);
            if(isset($_SESSION['ra'])){
                $r=$_SESSION['ra'];
                $a=$_SESSION['aadhar'];
                //echo $r;
            $sql="SELECT fn FROM aadhar WHERE rationno = '$r' and aadharno='$a'";

            $result=mysql_query($sql);

            if(mysql_num_rows($result)>0){
                if($row=mysql_fetch_assoc($result)){
                    $name=$row["fn"];
                    echo $name;
                }
            }
        }
            mysql_close($conn);
            $_SESSION['newra']=$name;
            $_SESSION['nra']=$r;
            
    
        ?>
        </h1>
        <div class="textbox" id="db">
            <i class="fa fa-user"></i>
            <input type="text" placeholder="Username" name="user" id="usern" >
        </div>
        <p id="e" class="error"></p>
        <div class="textbox"  id="db1">
            <i class="fa fa-lock"></i>
            <input type="password" placeholder="Password" id="p1" name="pass">
        </div>
        <p id="e1" class="error"></p>
        <div class="textbox"  id="db2">
            <i class="fa fa-lock"></i>
            <input type="password" id="p2" placeholder="Confirm Password">
        </div>
        <p id="e2" class="error"></p>
        <input type="submit" value="Create Ration Id" class="btn">
        <script>
         function valida(){
   var usera=document.getElementById("usern");
   var pass1=document.getElementById("p1");
   var pass2=document.getElementById("p2");
   var te=document.getElementById("");
   
   var valid=true;
        if(usera.value==""||usera.value.length==0)
        {
            document.getElementById('db').setAttribute("class","wronginput");
            document.getElementById('e').innerHTML="Invalid";   
            valid=false;
        }
        if(pass1.value==""){
            document.getElementById('db1').setAttribute("class","wronginput");
            document.getElementById('e1').innerHTML="Invalid";   
            valid=false;
        }
        if(pass1.value.length<8){
            document.getElementById('db1').setAttribute("class","wronginput");
            document.getElementById('e1').innerHTML="Enter atleast 8 characters";   
            valid=false;
        }
        if(pass2.value==""){
            document.getElementById('db2').setAttribute("class","wronginput");
            document.getElementById('e2').innerHTML="Invalid";   
            valid=false;
        }
        if(pass1.value!=pass2.value){
            document.getElementById('db2').setAttribute("class","wronginput");
            document.getElementById('e2').innerHTML="Password not same";   
            valid=false;
        }
   return valid;
}
        </script>
    </div>
  
    </form>
</body>
</html>

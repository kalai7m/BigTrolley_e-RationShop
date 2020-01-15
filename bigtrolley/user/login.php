<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <style>
         a.signup:link{
            color: white;
        }
        a.signup:visited{
            color:blue;
        }
        a.signup:hover{
        color:green;
        }
        a.signup:active{
            color:rgb(219, 20, 53);
        }
        </style>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bg.css">
   <link rel="stylesheet" href="css/fonts.css">
   <link rel="stylesheet" href="font/all.css">
   <link rel="stylesheet" href="css/bootstrap.css">
   
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" href="font/Poppins/OFL.txt">
   <link rel="stylesheet" href="css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,800,900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/bootstrap-validate.js"></script>
   <script src="js/wow.min.js"></script>
   <script src="js/bootstrapjquery.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/popper.js"></script>
   <script>
     new WOW().init();
   </script>
   
    <link rel="shortcut icon" href="a.ico">
    <title>Login-BIG TROLLEY</title>

    <style>
    .head{
    margin: auto;
    margin-top: 20px;
    margin-left: 40px;
    }
    </style>

</head>
<body>
    <div class="container-fluid back">
        <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="head">
              <h1 style="color: white;font-family: Audiowide;">
                <img style="height:20%;width: 20%;"src="a.ico" alt="">    Big Trolley
              </h1>
            </div>
                <form class="formcontain" onsubmit="return validate()" action="b.php" method="post">
                    <h1 style="font-family: Audiowide;">LOGIN</h1><h1 style="color: red;">
                    <?php
                    if(isset($_SESSION['er']) && !empty($_SESSION['er'])){
                        $ab=$_SESSION['er'];
                        echo $ab;
                        session_destroy();
                    }
                    ?></h1>
                    <div class="form-group">
                        <label for="mail">Ration card number</label>
                        <input type="text" class="form-control" id="mail" name="rno" placeholder="Ration number" pattern="[1-9]{1}[0-9]{4}" title="Enter ration number only">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" id="pwd" name="passwrd" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                    <a  class="signup" href="signup.php">Not Having an Account ?</a>
                </form>     
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
    <script>
    function validate()
    {
        var m=document.getElementById('mail');
        var p=document.getElementById('pwd');
        if(m.value.length==0 || p.value.length==0 ){
            alert("Empty fields !!!!");
            return false;
        }
        else{
             return true;
        }
    }
    bootstrapValidate('#mail','numeric:Enter only numerals')
    bootstrapValidate('#pwd','min:8:Enter atleast 8 characters')
    bootstrapValidate('#pwd','max:12:Enter correct password')
    </script>
</body>
</html>
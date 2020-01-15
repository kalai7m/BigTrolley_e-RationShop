<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bg.css">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/animate.css">
 
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <script src="js/bootstrap-validate.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrapjquery.js"></script>
    <script src="js/popper.js"></script>
   <!-- <script src="js/validate.js"></script>-->
    
    
    <link rel="shortcut icon" href="a.ico">
    <title>Signup-BIG TROLLEY</title>

    <style>
    .head{
    margin: auto;
    margin-top: 20px;
    margin-left: 40px;
    }

   
    </style>
</head>
<body>
    <div class="container-fluid back1">
        <div class="row">
     <div class="col-md-4 col-sm-4 col-xs-12"></div>
     <div class="col-md-4 col-sm-4 col-xs-12">
            <!--Title-->
            <div class="head">
              <h1 style="color-interpolation-filters: auto;color: black">
                <img style="height:20%;width: 20%;"src="a.ico" alt="">Big Trolley
              </h1>
            </div>

            <!--form-->

            <form style="color:black;" class="formcontain1" name="mf" onsubmit="return vali()" method="post" action="a.php">
              <h2 style="color: black;">Sign Up</h2>
              <h2 style="color: red;">
              <?php
                    if(isset($_SESSION['er']) && !empty($_SESSION['er'])){
                        $ab=$_SESSION['er'];
                        echo $ab;
                        session_destroy();
                    }
                    ?>
              </h2><br>
                    <div class="form-row">
                        <label  style="color: black;">Ration Card Number</label>
                        <input type="text" class="form-control" name="r" id="regex" placeholder="Ration number">
                    </div>
                    <p id="err"></p>

                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                        <label class="form-check-label" for="invalidCheck" style="color: black;">
                          Agree to terms and conditions
                        </label>
                        
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit" id="sbtn">Submit form</button>
                  </form>
                  
                  
     </div>
     <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
    </div>

    <script>
        
        function vali(){
            var ration=document.getElementById("regex");
            if(ration.value.length==0 || isNaN(ration.value) || ration.value.length!=5)
            {
                alert("Provide a valid ration number");
                return false;
            }
           else{
               return true;
           }
           
        }
    </script>
</body>
</html>
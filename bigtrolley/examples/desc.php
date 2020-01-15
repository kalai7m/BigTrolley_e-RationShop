<?php
  session_start();
  /*if(!isset($_COOKIE['logincook']))
  {
    header("location: ../user/login.php");
  }*/
  $conn=mysql_connect("localhost","root","") or die("Could not connect");
  $selected=mysql_select_db("bigt",$conn);
  $x=$_SESSION['login'];

  $sql="SELECT * FROM aadhar WHERE aadharno=(SELECT aadharno FROM ration WHERE rationno='$x')";
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result))
    {
      $ano=$row['aadharno'];
      $rno=$row['rationno'];
      $fn=$row['fn'];
      $ln=$row['ln'];
    }
?>
<?php
 $id=$_GET["id"];
                  
                    $link=mysqli_connect("localhost","root","");
                    mysqli_select_db($link,"bigt");
if(isset($_POST["submit1"]))
{
	$d=0;
	if(is_array($_COOKIE['item']))
	{
		foreach($_COOKIE['item'] as $name => $value) //this for checking cookies available or not
		{
			$d=$d+1;
		}
		$d=$d+1;
	}
	else
	{
		$d=$d+1;
	}
	//to get item description from table
	$res3=mysqli_query($link,"select * from product where id=$id");
	 while($row3=mysqli_fetch_array($res3))
	 {
		 $img1=$row3["product_image"];
		 $nm=$row3["product_name"];
		 $prize=$row3["product_price"];
		 $qty="1";
		 $total=$prize*$qty;
	 }
	 
	if(is_array($_COOKIE['item']))
	{
		foreach ($_COOKIE['item'] as $name1 => $value)
		{
			$values11=explode("__",$value);
			$found=0;
			if($img1==$values11[0])
			{
				$found=$found+1;
				$qty=$values11[3]+1;
				$tb_qty;
				$res=mysqli_query($link,"select * from product where product_image='$img1'");
				while($row=mysqli_fetch_array($res))
				{
					$tb_qty=$row["product_qty"];
				}
				if($tb_qty<$qty){
					?>
					<script type="text/javascript">
					alert("This much quantity not available");
					</script>

					<?php
				}
				$total=$values11[2]*$qty;
				setcookie("item[$name1]",$img1."__".$nm."__".$prize."__".$qty."__".$total,time()+1800);
			}
		}
		if($found==0)
		{
			$tb_qty;
			$res=mysqli_query($link,"select * from product where product_image='$img1'");
			while($row=mysqli_fetch_array($res))
			{
				$tb_qty=$row["product_qty"];
			}
			if($tb_qty<$qty){
				?>
				<script type="text/javascript">
				alert("This much quantity not available");
				</script>

				<?php

			}
			else{
				setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total,time()+1800);
			}
		}
	}	
	else
	{
			$tb_qty;
			$res=mysqli_query($link,"select * from product where product_image='$img1'");
			while($row=mysqli_fetch_array($res))
			{
				$tb_qty=$row["product_qty"];
			}
			if($tb_qty<$qty){
				?>
				<script type="text/javascript">
				alert("This much quantity not available");
				</script>

				<?php
			}
			else{
				setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total,time()+1800);
			}
	}


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" href="../user/a.ico">
  <title>
   Dashboard - Big Trolley 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../user/css1/main.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="../user/bigtrolley.php" class="simple-text logo-mini">
          <img src="../user/a.ico" />
        </a>
        <a href="../user/bigtrolley.php" class="simple-text logo-normal">
          BIG TROLLEY
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Shop</p>
            </a>
          </li>
         
         <!-- <li>
            <a href="./map.html">
              <i class="now-ui-icons location_map-big"></i>
              <p>Maps</p>
            </a>
          </li>-->
         <!-- <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>-->
          <li>
            <a href="./user.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>My Orders</p>
            </a>
          </li>
          <li>
            <a href="./tables.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Family Details</p>
            </a>
          </li>
      <!--    <li>
            <a href="./typography.html">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li>-->
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <img src="../user/image/b1.jpg" class="rounded-circle" alt="Cinque Terre" height="50px" width="50px">
            <a class="navbar-brand pl-2" href="#pablo"><?php echo $fn." ".$ln; ?></a>
          </div>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                Ration : 
               <?php echo $rno; ?>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="cart.php" data-toggle="tooltip" data-placement="top" title="Checkout Cart">
                <i class="fa fa-shopping-cart"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <!--<a class="dropdown-item" href="#">Action</a>-->
                  <a class="dropdown-item" href="#">Change Password</a>
                  <a class="dropdown-item" href="#">Logout</a>
                </div>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" href="#pablo">
                <img src="../user/image/b1.jpg" class="rounded-circle" alt="Cinque Terre" height="50px" width="50px">
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>-->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-md">
        <div>
            <h2 style="color: white;" class="text-center">Featured Items</h2>
        </div>
      </div>
      <div class="content">
      <div class="row">
    <!--  <div class="col-sm-9">-->
                <!--<div class="features_items">--><!--features_items-->
                    <!--<h2 class="title text-center">Features Items</h2>-->
                    <?php
                    
                   
						$res=mysqli_query($link,"select * from product where id=$id");
						while($row=mysqli_fetch_array($res)){
							?>
							
				
						<div class="col-sm-5">
							<div class="view-product">
							<img src="../admin/<?php echo $row["product_image"]; ?>" alt="" height="300" width="400"/>
							</div>
						</div>


					<form action="" name="form1" method="post">
						
					
							<div class="product-information" style="background:white;"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row["product_name"]; ?></h2>
								<p><b>Product ID: <?php echo $row["id"]; ?></b></p>
								<span>
									<span>Rs: <?php echo $row["product_price"]; ?></span>
									<label>Quantity: </label>
									<input type="text" value="1" />
									<button type="submit" name="submit1" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> <?php echo $row["product_qty"]; ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						
					<!--/product-details-->
					</form>

						<?php
						}
						?>
                   
      </div>
                
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <img src="../user/a.ico" height="25px" width="25px">
                <a href="../user/bigtrolley.php">
                  Big Trolley
                </a>
              </li>
              <li>
                <a href="../user/bigtrolley.php">
                  About Us
                </a>
              </li>
              <li>
                <a href="../user/bigtrolley.php">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <i class="fa fa-heart" style="color: red;"></i><a href="../user/bigtrolley.php" target="_blank">BIG TROLLEY Creationz</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>
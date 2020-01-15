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
						if(isset($_POST["submitcheck"]))
						{
							echo "hello";
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bigt";

							// Create connection
							$conn =mysqli_connect($servername, $username, $password, $dbname);

							$stmt = $conn->prepare("INSERT INTO ordert (rationno) VALUES (?)");
							$stmt->bind_param("i", $rno);

							// set parameters and execute
							$rno=11112;
							$stmt->execute();
							$stmt->close();
							$conn->close();
					
							$link=mysqli_connect("localhost","root","");
							mysqli_select_db($link,"bigt");
							$res3=mysqli_query($link,"select * from ordert where rationno='$rno'");
							while($row3=mysqli_fetch_array($res3))
							{
								$orderid=$row3["orderid"];
							}
							echo $orderid;
	?>
					<script type="text/javascript">
						alert("Click ok to transfer in paypal");

						setTimeout(function()  {
							window.location="../user/paypal.php";
						}, 4000);
					</script>
					<?php
						}
					?>

<!--hello-->

					<?php
						if(isset($_POST["submitcheck1"]))
						{
							echo "hello";
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bigt";

							// Create connection
							$conn =mysqli_connect($servername, $username, $password, $dbname);

							$stmt = $conn->prepare("INSERT INTO ordert (rationno) VALUES (?)");
							$stmt->bind_param("i", $rno);

							// set parameters and execute
							$rno=$_SESSION['login'];;
							$stmt->execute();
							$stmt->close();
							$conn->close();			
							$link=mysqli_connect("localhost","root","");
							mysqli_select_db($link,"bigt");
							$res3=mysqli_query($link,"select * from ordert where rationno='$rno'");
							while($row3=mysqli_fetch_array($res3))
							{
                $orderid=$row3["orderid"];
                $ran=$row3["rationno"];
							}
							echo $orderid;
              $_SESSION["oid"]=$orderid;
              $_SESSION["rr"]=$ran;
	?>
					<script type="text/javascript">
						alert("Click ok to transfer in paypalllllllllll");

						setTimeout(function()  {
							window.location="./payment_success.php";
						}, 2000);

					</script>
					<?php
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
  <style>
  .cart_menu {
  background: #FE980F;
  color: #fff;
  font-size: 16px;
  font-family: 'Roboto', sans-serif;
  font-weight: normal;
}  

  </style>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->

  <link href="../assets/css/main1.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../user/css1/price-range.css" rel="stylesheet">
  <link href="../user/css1/responsive.css" rel="stylesheet">
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
                <a class="nav-link" href="#pablo" data-toggle="tooltip" data-placement="top" title="Checkout Cart">
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
                  <a class="dropdown-item" href="../user/logoutuser.php">Logout</a>
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
      <div class="panel-header panel-header-sm">
        <div>
            <h2 style="color: white;" class="text-center">Checkout</h2>
        </div>
      </div>
      <div style="padding-left:10px;">
      <div class="row" style="background: #ffdd99;">
    <!--  <div class="col-sm-9">-->
                <!--<div class="features_items">--><!--features_items-->
                    <!--<h2 class="title text-center">Features Items</h2>-->
                    <div class="table-responsive cart_info">
				<form action="" method="post">
				<table class="table table-condensed">
					
					<?php
					$d=0;

					if(is_array($_COOKIE['item'])){
                    $d=$d+1;
					}
					if($d==0){
						echo "no record available in cart";
						echo "<br><br><br><br>";
					}
					else
					{
						?>
						<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>

					<tbody>

					<?php
					    foreach ($_COOKIE['item'] as $name1 => $value)
						{
							$values11=explode("__",$value);
							?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="../admin/<?php echo $values11[0]; ?>" alt="" height="100" width="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values11[1]; ?></a></h4>

							</td>
							<td class="cart_price">
								<p><?php echo $values11[2]; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $values11[3]; ?>" autocomplete="off" size="2" readonly>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $values11[4]; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
							<?php
						}
					?>

					
					</tbody>
				    </table>
						<?php

					}
					$tot=0;
					foreach ($_COOKIE['item'] as $name1 => $value)
					{
						$values11=explode("__",$value);
						$tot=$tot+$values11[4];
					}
					
					
					$_SESSION["pay"]=$tot;
					//$_SESSION["orderid"]=$orderid;
					?>

					<div style="padding-left:550px;background:orange;color:white;" class="cart_total"><p style="font-size:35px;"><?php echo "Rs:".$tot; ?></p></div>
					

						

						
					<center><input type="submit" name="submitcheck" value="checkout" class="btn btn-success btn-lg" ><input type="submit" name="submitcheck1" value="Sample checkout" class="btn btn-success btn-lg" ></center>
					<!--Checkout submit button with paypal alert-->
					</form>
			
			</div>
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
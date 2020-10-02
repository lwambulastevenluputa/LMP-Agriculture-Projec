<?php
include('header-top_chat.php');
?>

<div class="header_top"><!--header_top-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="contactinfo">
					<ul class="nav nav-pills">
						<li><a href="#"><i class="fa fa-phone"></i> +260 975 651 046</a></li>
						<li><a href="#"><i class="fa fa-envelope"></i> info@lendmepay.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="social-icons pull-right">
					<ul class="unstyled d-flex">
						<!-- <li><a href="#"><i class="fab fa-facebook"></i></a></li> -->
						<!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
						<!-- <li><a href="#"><i class="fab fa-linkedin"></i></a></li> -->
						<li><a href="#" class="link <?php if(!isset($_SESSION["loggedin"])) echo "d-none" ?>">Ship to</a></li>
						<li><a href="#" class="link <?php if(!isset($_SESSION["loggedin"])) echo "d-none" ?>">Hire</a></li>
						<li><a href="dashboard_merchant.php" class="link <?php if(!isset($_SESSION["loggedin"])) echo "d-none"  ?>" >Sell</a></li>
						<li><a href="#" class="link <?php if(!isset($_SESSION["loggedin"])) echo "d-none" ?>">Watchlist</a></li>
						<li><a href="logout.php" class="link <?php if(!isset($_SESSION["loggedin"])) echo "d-none" ?>">Sign Out</a></li>
						<li><a href="signin.php" class="link <?php if(isset($_SESSION["loggedin"])) echo "d-none" ?>">Sign in</a></li>
						<li><a href="signup.php" class="link <?php if(isset($_SESSION["loggedin"])) echo "d-none" ?>">Sign up</a></li>
						<li><a href="#"><i class="far fa-user-circle <?php if(!isset($_SESSION["loggedin"])) echo "d-none" ?>"></i><?php if(isset($_SESSION["loggedin"])){ echo $_SESSION["firstname"]; } else {echo "Guest";} ?></a></li>
						<li><a href="#" class="<?php if(!isset($_SESSION["loggedin"])) echo "d-none" ?>"><i class="far fa-bell"></i></a></li>
						<li class="cart-icon"><a  href="cart.php"><i class="fas fa-shopping-cart "></i><span id="cart-item" class="badge" style="color: #fff; background-color: #FE980F;"></span></a></li>
					
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!--/header_top-->
<div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
        <ul class="unstyled categories-link d-flex justify-content-center">
            <?php
			if (isset($_SESSION['mobilenumber'])) { ?>
            <li><a href="#"
                    onclick="document.getElementById('drawerbg').style.display='';document.getElementById('drawer1').style.display='';">Chat</a>
            </li>
            <li><a href="#"
                    onclick="document.getElementById('drawerbg').style.display='';document.getElementById('drawer2').style.display='';document.getElementById('drawer3').style.display='';">Contacts</a>
            </li>
            <?php
			}
			?>
            <li><a href="#">Vendors</a></li>
            <li><a href="#">Fruits & Vegetables</a></li>
            <li><a href="#">Livestock</a></li>
            <li><a href="#">Poultry</a></li>
            <li><a href="#">Fish</a></li>
        </ul>
        <!-- <div class="row">
			<div class="col-sm-9">
                <div class="shop-menu pull-left">
					<ul class="nav">
						<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
						<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
						<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
						<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="search_box pull-right">
					<input type="text" placeholder="Search"/>
				</div>
			</div>
		</div> -->
    </div>
</div>
<!--/header-bottom-->
<div class="header-middle"><!--header-middle-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- <div class="logo pull-left">
					<a href="index.php"><img src="img/Logo.png" id="nav-logo" alt="" /></a>
                </div> -->
                <nav class="navbar navbar-expand-lg navbar-light" style="display: flex;">
                    <div class="logo" style="margin-right: auto;">
					    <a class="navbar-brand" href="index.php"><img src="img/Logo.png" id="nav-logo" alt="" /></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

			        

			        <div class="search__box">
                      
<table style="width:100%; text-align:center; font-size:16px; color:#000; height:30px; border:1px #555 solid; outline:none; background:#fff; border-collapse:seperate; border-radius:10px">
    <tr align="center">
        <td style="width:85%">
<input type="text" id="inputsearchterm" onkeyup="loadsearch(<?php echo $accountuser; ?>)" placeholder="Search Store" style="width:100%; border-radius:4px; text-align:left; font-size:14px; color:#000; height:30px; border:none; outline:none"/>
</td>
        <td style="width:15%; color:#f90" onclick="loadsearch(<?php echo $accountuser; ?>)">    
        <i class="far fa-search fa-sm"></i> 
</td>
    </tr>
</table>
			        </div>

                    <div class="" id="navbarSupportedContent" >
                        
                      <ul class="navbar-nav collapse navbar-collapse" >
                        <!-- <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> -->
                        <li class="nav-item">
                          <a class="nav-link active" href="index.php">All Products</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="market_prices.php">Market Prices</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Special Offers 
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Fixed Products</a>
                            <a class="dropdown-item" href="#">Best Offer Products</a>
                            <a class="dropdown-item" href="#">Auction Products</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">Promotion Products</a>
                          </div>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Sell</a>
                        </li> -->
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Place Command</a>
                        </li> -->
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Blog</a>
                        </li> -->
                        <li class="nav-item">
                          <a class="nav-link" href="#">Contact Us</a>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link disabled" href="#">Disabled</a>
                        </li> -->
                      </ul>
                      <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form> -->
                    </div>
                </nav>
			</div>
		</div>
	</div>
</div><!--/header-middle-->
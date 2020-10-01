<div class="product-details d-flex"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="<?= $p_image; ?>" alt="" />
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
		    <!-- Wrapper for slides -->
		    <!--<div class="carousel-inner">-->
		    <!--    <div class="item active">-->
		    <!--      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>-->
		    <!--      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>-->
		    <!--      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
		    <!--    </div>-->
		    <!--    <div class="item">-->
		    <!--      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>-->
		    <!--      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>-->
		    <!--      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
		    <!--    </div>-->
		    <!--    <div class="item">-->
		    <!--      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>-->
		    <!--      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>-->
		    <!--      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
		    <!--    </div>		-->
		    <!--</div>-->
		    
			 <!-- Controls -->
			 <!--<a class="left item-control" href="#similar-product" data-slide="prev">-->
			 <!--   <i class="fa fa-angle-left"></i>-->
			 <!--</a>-->
			 <!--<a class="right item-control" href="#similar-product" data-slide="next">-->
			 <!--   <i class="fa fa-angle-right"></i>-->
			 <!--</a>-->
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2 class="mb-0"><?= $p_name; ?></h2>
            <p style="font-size:13px;">Sold by: <?= $p_seller; ?></p>
            <div class="pt-4"></div>
            <p><b>Category:</b> <?= $p_cat; ?></p>
            <p><b>Brand:</b> <?= $brand; ?></p>
            <p><b>Availability:</b> In Stock</p>
			<p><b>Condition:</b> Fresh</p>
            <p><b>Pricing Type:</b> Fixed</p>
			<p><b>Shipping Type:</b> <?= $shipping_type; ?></p>
			<p><b>Posted date:</b> <?= $date; ?></p>
			
			<img src="images/product-details/rating.png" alt="" />
			<span>
				<span>ZMW <?= number_format($p_price,2); ?></span>
				<!-- <label>Quantity:</label> -->
				<!-- <input type="text" value="3" /> -->
				<button type="button" class="btn btn-fefault cart">
					<i class="fa fa-shopping-cart"></i>
					Add to cart
				</button>
			</span>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->
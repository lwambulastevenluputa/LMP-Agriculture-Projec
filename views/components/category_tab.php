                
<div class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs"> 
            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
            <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            <!-- <li>Review</li> -->
            <!-- <li></li> -->
        </ul>
    </div>
    <div class="tab-content col-md-12">
        <div class="tab-pane fade active in" id="details">
            <!-- Details of the product goes here -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">Product Description</div>
                        <div class="panel panel-body"><?= $p_desc; ?></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">Shipping Details <a href="#" class="pull-right" data-toggle="modal" data-target="#shippingoffers" data-original-title>View all shipping offers</a></div>
                        <div class="panel panel-body">
                            <div class="col-lg-6" id="shipping">
                                <p>Shipping Type: <b>Local Pickup</b></p>
                                <p>Province(s): <b>West</b></p>
                                <p>Town: <b>Local Pickup</b></p>
                                <p>Address Line 1: <b>Plot 48, Senenga Rd</b></p>
                                <p>Address Line 1: <b>Mashland</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="tab-pane fade active in" id="companyprofile"></div> 
        <div class="tab-pane fade active in" id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href="#"><i class="fa fa-user"></i> Kanai</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"> 12:41 PM</i></a></li>
                    <li><a href="#"><i class="fa fa-calendar-o"></i> 14 SEPT 2020</a></li>
                </ul>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
                <p>
                    <b>Write Your Review</b>
                </p>
                <form action="#">
                    <span>
                        <input type="text" name="name" id="" placeholder="Your Name">
                        <input type="email" name="email" id="" placeholder="Email Address">
                    </span>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <button class="btn btn-default pull-right">Submit</button>
                </form>
            </div>
        </div> 
    </div>
</div><!--/nav-tabs-->

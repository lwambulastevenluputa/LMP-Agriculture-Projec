<div class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <nav class="nav nav-tabs mt-2" id="myTab" role="tablist">
          <!-- <a class="nav-link active" href="#">Details</a> -->
          <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
          <!-- <a class="nav-link" href="#">Reviews (5)</a> -->
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (5)</a>
          <!-- <a class="nav-link" href="#">Company Profile</a> -->
          <a class="nav-link" id="companyprofile-tab" data-toggle="tab" href="#companyprofile" role="tab" aria-controls="companyprofile" aria-selected="false">Company Profile</a>
          <!-- <a class="nav-link disabled" href="#">Disabled</a> -->
        </nav>

        <!-- <div class="top-padding-50"></div> -->

        <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reviews (5)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Company Profile</a>
            </li>
        </ul> -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                <div class="row mt-4">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-header">Product Description</div>
                        <div class="card-body">
                          <!-- <h5 class="card-title">Special title treatment</h5> -->
                          <p class="card-text"><?= $p_desc; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-header">Shipping Details</div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Special title treatment</h5> -->
                            <p class="mb-0">Shipping Type: <b><?= $shipping_type; ?></b></p>
                            <p class="mb-0">Province(s): <b><?= $provinces; ?></b></p>
                            <p class="mb-0">Town: <b><?= $towns; ?></b></p>
                            <!-- <p class="mb-0">Address Line 1: <b>Plot 48, Senenga Rd</b></p> -->
                            <!-- <p class="mb-0">Address Line 1: <b>Mashland</b></p> -->
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="review-tab">
                <div class="col-sm-12">
                    <ul class="nav mt-4">
                        <li><a href="#"><i class="fa fa-user"></i> Kanai</a></li>
                        <li><a href="#"><i class="far fa-clock"></i> 12:41 PM</a></li>
                        <li><a href="#"><i class="far fa-calendar-alt"></i> 14 SEPT 2020</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
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
          <div class="tab-pane fade" id="companyprofile" role="tabpanel" aria-labelledby="companyprofile-tab">...</div>
        </div>
    </div>
</div>
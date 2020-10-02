<?php 
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: signin.php");
        exit;
    }
    
    // import layout
    require 'dashboard/views/head.php'; 
    include 'dashboard/views/top-navbar.php'; 
    include 'dashboard/views/sidebar.php'; 

    include 'controllers/add_product.php';
?>

    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container" >
                    <h1 class="mt-4">Create New Product </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard / Add Product</li>
                    </ol>
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-mango-orange"><h3 class="text-center font-weight-light my-4 text-white">Create New Product</h3></div>
                                <div class="card-body">
                                    <form action="add_product.php" method="post" enctype="multipart/form-data">
                                        <?php //if(isset($_GET['msg'])) { echo $_GET['msg']; } ?>
                                        <?= $msg ?>
                                        <!-- Product Name -->
                                        <div class="form-group">
                                            <input type="text" name="pName" placeholder="Product Name" class="form-control" required>
                                        </div>
                                        <!-- Product Price -->
                                        <div class="form-group">
                                            <input type="text" name="pPrice" placeholder="Product Price" class="form-control" required>
                                        </div>
                                        <!-- Select Currency -->
                                        <div class="form-group">
                                            <select name="pCurrency" id="" class="form-control">
                                                <option value="" selected disabled>-Select Currency-</option>
                                                <option value="GBP">Pounds Sterling (GBP)</option>
                                                <option value="EUR">Euro (EURO)</option>
                                                <option value="CHF">Switzerland (CHF)</option>
                                                <option value="USD">US Dollar (USD)</option>
                                                <option value="CAD">Canadian Dollar (CAD)</option>
                                                <option value="AUD">Australian Dollar (AUD)</option>
                                                <option value="HKD">Hong Kong Dollar (HKD)</option>
                                                <option value="JPY">Japanese Yen (JPY)</option>
                                                <option value="NZD">New Zealand Dollar (NZD)</option>
                                                <option value="KES">Kenyan Shilling (KES)</option>
                                                <option value="NGN">Nigerian Naira (NGN)</option>
                                                <option value="ZAR">South African Rand (ZAR)</option>
                                                <option value="ZMW">Zambian Kwacha (ZMW)</option>
                                            </select>
                                        </div>
                                        <!-- Select Category -->
                                        <div class="form-group">
                                            <select name="pCategory" id="" class="form-control">
                                                <option value="" selected disabled>-Select Product Category-</option>
                                                <option value="Fruits">Fruits</option>
                                                <option value="Vegetables">Vegetables</option>
                                                <option value="Cereals/Cash Crops">Cereals/Cash Crops</option>
                                                <option value="Livestock">Livestock</option>
                                                <option value="Roots/Tubers">Roots/Tubers</option>
                                                <option value="Poultry">Poultry</option>
                                                <option value="Fish">Fish</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>           
                                        <!-- Select Brand -->
                                        <div class="form-group">
                                            <select name="pBrand" id="" class="form-control">
                                                <option value="" selected disabled>-Select Product Brand-</option>
                                                <option value="ETG">ETG</option>
                                                <option value="Other">Other</option>
                                                <option value="Amiran">Amiran</option>
                                                <option value="McDonalds">McDonalds</option>
                                                <option value="KFC">KFC</option>
                                                <option value="Keg">Keg</option>
                                            </select>
                                        </div>                   
                                        <!-- Product Code -->
                                        <div class="form-group">
                                            <input type="text" name="pCode" placeholder="Product Code" class="form-control" required>
                                        </div>

                                        <!-- Stock -->
                                        <div class="form-group">
                                            <input type="number" name="pStock" placeholder="Enter Stock Quantity" class="form-control" required>
                                        </div>

                                        <!-- Upload Product Image -->
                                        <div class="form-group">
                                            <div class="custom-file">
                                            <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                                            <label for="customFile" class="custom-file-label">Choose Product Image</label>
                                            </div>
                                        </div />
                                        <!-- Farmer/Producer Info -->
                                        <div class="form-group">
                                            <input type="text" name="pSeller" placeholder="Farmer's Name" class="form-control" required>
                                        </div>
                                        
                                        <!-- Product Description -->
                                        <div class="form-group">
                                            <textarea name="pDescription" id="" cols="30" rows="5" class="form-control" placeholder="Enter Produt Description""></textarea>
                                            <!-- <input type="textarea"  name="product_desc" row="10" cols="20" placeholder="Enter Produt Description"> -->
                                        </div>
                                        <!-- Select Product Condition -->
                                        <div class="form-group">
                                            <select name="pCondition" id="" class="form-control">
                                                <option value="" selected disabled>-Select Product Condition-</option>
                                                <option value="Fresh">Fresh</option>
                                                <option value="Dried">Dried</option>
                                            </select>
                                        </div> 
                                        <!-- Select Shipping Type -->
                                        <div class="form-group">
                                            <select name="pShippingType" id="" class="form-control">
                                                <option value="" selected disabled>-Select Product Condition-</option>
                                                <option value="Global">Global</option>
                                                <option value="Local">Local</option>
                                                <option value="Free Shipping">Free Shipping</option>
                                            </select>
                                        </div> 
                                        <!-- Province supply -->
                                        <div class="form-group">
                                            <input type="text" name="pProvince" placeholder="Enter provinces you are able to supply to" class="form-control" required>
                                        </div>
                                        
                                        <!-- Town/City supply -->
                                        <div class="form-group">
                                            <input type="text" name="pCity" placeholder="Enter towns & cities you are able to supply to" class="form-control" required>
                                        </div>
                                        
                                        <input type="submit" name="add_btn" value="Create Product" class="btn btn-block" style="background-color: #ffcc80">
                                        <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-block" style="background-color: #ffcc80;" href="dashboard-merchant/login.php">Create Account</a></div> -->
                                    </form>
                                </div>
                                <div class="card-footer text-center bg-mango-orange">
                                    <div class="small"><a href="dashboard-merchant/index.php" class="text-white">Merchant Dashboard</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- end main -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MangoChat 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end layoutSidenav_content -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
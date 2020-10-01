<?php 
    // create a database connection
    include 'controllers/user_auth.php';

    // import templates
    include 'template/head.php'; 
    include 'template/top-navbar.php'; 
    include 'template/sidebar.php'; 

    
    $msg = "";
    if(isset($_POST['submit'])) {
        $p_name = $_POST['pName'];
        $p_price = $_POST['pPrice'];
        $p_code = $_POST['pCode'];
        $currency = $_POST['currency'];

        $target_dir = "img/";
        $target_file = $target_dir.basename($_FILES['pImage']["name"]);
        move_uploaded_file($_FILES['pImage']["tmp_name"], $target_file);

        $query = "INSERT INTO products (product_name, product_price, product_image, product_code, currency) VALUES ('$p_name', '$p_price','$target_file', '$p_code', '$currency')";
        if(mysqli_query($conn, $query)) {
            $msg = "Product Added to the database successfully";
        }
        else {
            $msg = "Failed to add the product in the database!";
        }
    }
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
                                        <form action="register.php" method="post">

                                            <?php include('controllers/errors.php'); ?>
                                            <!-- Product Name -->
                                            <div class="form-group">
                                                <input type="text" name="pName" placeholder="Product Name" class="form-control" required>
                                            </div>
                                            <!-- Product Price -->
                                            <div class="form-group">
                                                <input type="text" name="pPrice" placeholder="Product Price" class="form-control" required>
                                            </div>
                                            <!-- Select Category -->
                                            <div class="form-group">
                                                <select name="currency" id="" class="form-control">
                                                    <option value="" selected disabled>-Select Product Category-</option>
                                                    <option value="fooddrink">Food and Drinks</option>
                                                    <option value="Tranport">Transport</option>
                                                    <option value="electronics">Electronics</option>
                                                    <option value="gym">Gym</option>
                                                    <option value="houses">Houses</option>
                                                    <option value="fashion">Fashion</option>
                                                    <option value="handware">Hardware</option>
                                                </select>
                                            </div>
                                            <!-- Select Currency -->
                                            <div class="form-group">
                                                <select name="currency" id="" class="form-control">
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
                                            <!-- Product Code -->
                                            <div class="form-group">
                                                <input type="text" name="pCode" placeholder="Product Code" class="form-control" required>
                                            </div>
                                            <!-- Upload Product Image -->
                                            <div class="form-group">
                                                <div class="custom-file">
                                                <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                                                <label for="customFile" class="custom-file-label">Choose Product Image</label>
                                                </div>
                                            </div />
                                            <!-- Seller Info -->
                                            <div class="form-group">
                                                <input type="text" name="pCode" placeholder="Enter seller Name or Company" class="form-control" required>
                                            </div>
                                            
                                            <!-- Product Description -->
                                            <div class="form-group">
                                                <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Enter Produt Description""></textarea>
                                                <!-- <input type="textarea"  name="product_desc" row="10" cols="20" placeholder="Enter Produt Description"> -->
                                            </div>
                                            <input type="submit" name="reg_user" value="Create Product" class="btn btn-block" style="background-color: #ffcc80">
                                            <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-block" style="background-color: #ffcc80;" href="login.php">Create Account</a></div> -->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center bg-mango-orange">
                                        <div class="small"><a href="index.php" class="text-white">Merchant Dashboard</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
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

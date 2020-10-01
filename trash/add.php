<?php
    require 'config.php';

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

<?php 
    include 'template/header.php'; 
    include 'template/navbar.php'; 
?>

        <div class="container top-padding-60">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light mt-5 rounded f2f2f2">
                    <h2 class="text-center p-2">Add New Product</h2>
                    <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                        <div class="form-group">
                            <input type="text" name="pName" placeholder="Product Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="pPrice" placeholder="Product Price" class="form-control" required>
                        </div>
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
                        <div class="form-group">
                            <input type="text" name="pCode" placeholder="Product Code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                            <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                            <label for="customFile" class="custom-file-label">Choose Product Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success btn-block" value="Add" required>
                        </div>
                        <div class="form-group">
                            <h4 class="text-center"><?= $msg; ?></h4>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 mt-3 p-4 bg-light rounded">
                    <a href="index.php" class="btn bg-mango-orange btn-block btn-lg">
                        Go to product page
                    </a>
                </div>
            </div>
        </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    </body>
</html>
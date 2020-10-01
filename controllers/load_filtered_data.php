<?php 
    require '../database/db_connection.php';

    if(isset($_POST['action'])) {
        $sql = "SELECT * FROM products WHERE product_brand != ''";

        // Filter Shop by Category
        if(isset($_POST['category'])) {
            $category = implode("','", $_POST['category']);
            $sql .= "AND product_category IN('".$category."')";
        }
        
        // Filter search by brand
        if(isset($_POST['brand'])) {
            $brand = implode("','", $_POST['brand']);
            $sql .= "AND product_brand IN('".$brand."')";
        }

        // Filter search by ram
        if(isset($_POST['ram'])) {
            $ram = implode("','", $_POST['ram']);
            $sql .= "AND ram IN('".$ram."')";
        }

        // Filter search by hdd
        if(isset($_POST['hdd'])) {
            $hdd = implode("','", $_POST['hdd']);
            $sql .= "AND hdd IN('".$hdd."')";
        }
        
         // Filter search by processor
         if(isset($_POST['processor'])) {
            $processor = implode("','", $_POST['processor']);
            $sql .= "AND processor IN('".$processor."')";
        }

         // Filter search by screen size
         if(isset($_POST['screen'])) {
            $screen_size = implode("','", $_POST['screen']);
            $sql .= "AND screen_size IN('".$screen_size."')";
        }

         // Filter search by os
         if(isset($_POST['os'])) {
            $os = implode("','", $_POST['os']);
            $sql .= "AND os IN('".$os."')";
        }
    }

    $result = $conn->query($sql);
    $output='';

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .='<div class="col-md-3 mb-2">
            <div id="product" class="product-image-wrapper">
                <div class="single-product">
                    <div class="productinfo text-center">
                        <a href="product_details.php?id='. $row['id'] .'"><img src="'. $row['product_image'] .'" alt="" class="card-img-top" height="250"></a>
                        <h2>ZMW '. number_format($row['product_price'],2) .'</h2>
                        <p>'. $row['product_name'] .'</p>
                    </div>
                    <div class="p-2">
                        <form action="" class="form-submit">
                            <input type="hidden" class="pid" value="'. $row['id'] .'">
                            <input type="hidden" class="pname" value="'. $row['product_name'] .'">
                            <input type="hidden" class="pprice" value="'. $row['product_price'] .'">
                            <input type="hidden" class="pimage" value="'. $row['product_image'] .'">
                            <input type="hidden" class="pcode" value="'. $row['product_code'] .'">
                            <input type="hidden" class="currency" value="'. $row['currency'] .'">
                            <!-- <a href="" class="btn btn-default add-to-cart addItemBtn text-center"><i class="fas fa-cart-plus"></i>Add to cart</a> -->
                            <button class="btn btn-block add-to-cart addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
        }
    } else {
        $output = "<h3>No Product Found!</h3>";
    }
    echo $output;

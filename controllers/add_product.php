<?php 

    // create a database connection
    include 'database/connect.php';

    $msg = "";
    $errors = array();

    if(isset($_POST['add_btn'])) {
        $p_name = $_POST['pName'];
        $p_price = $_POST['pPrice'];
        $p_category = $_POST['pCategory'];
        $p_brand = $_POST['pBrand'];
        $p_code = $_POST['pCode'];
        $p_stock = $_POST['pStock'];
        $p_seller = $_POST['pSeller'];
        $p_currency = $_POST['pCurrency'];
        $p_desc = $_POST['pDescription'];
        $p_condition = $_POST['pCondition'];
        $shipping_type = $_POST['pShippingType'];
        $province = $_POST['pProvince'];
        $city = $_POST['pCity'];

        $target_dir = "assets/uploads/";
        $target_file = $target_dir . basename($_FILES["pImage"]["name"]);
        move_uploaded_file($_FILES["pImage"]["tmp_name"], $target_file);

        // procedural
        $insert_product = "INSERT INTO products (product_name, product_description, product_image, product_price, product_category, product_brand, product_code, product_seller, currency, stock, product_condition, shipping_type, provinces, cities_towns, username) 
            VALUES ('$p_name', '$p_desc', '$target_file', '$p_price', '$p_category', '$p_brand','$p_code', '$p_seller', '$p_currency', '$p_stock', '$p_condition', '$shipping_type', '$province', '$city', '$uphone')";

        if(mysqli_query($conn, $insert_product)) {
            $msg = '<b class="text-success"> Product Added to the database successfully </b>';
        }
        else {
            $msg = 'Failed to add the product in the database! <br>
                <b class="text-danger">' . mysqli_error($conn) . '</b>';
        }
    }

    // $back_to_add_product_form = "location: ../add_product.php?msg=". $msg;
    // header($back_to_add_product_form);
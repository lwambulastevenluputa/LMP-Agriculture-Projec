<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["pImage"]["name"]);
    move_uploaded_file($_FILES["pImage"]["tmp_name"], $target_file);

    // prepare and bind [Prepared Statements]
    // $stmt = $conn->prepare("INSERT INTO products(product_name,product_description,product_image,product_price,product_category, product_brand, product_code, product_seller, currency, stock) 
    //     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // if(!$stmt) {
    //     die("Error my G: " . $conn->error);
    // }

    // $stmt->bind_param("sssisssssi", $p_name,$p_desc,$target_file, $p_price,$p_category, $p_brand, $p_code, $p_seller,$p_currency, $p_stock);
    // $stmt->execute();

    // $msg = "Product Added to the database successfully!  <b>" . $conn->error . "</b>";
    
    // procedural
    $query = "INSERT INTO products (product_name, product_description, product_image, product_price, product_category, product_brand, product_code, product_seller, currency, stock) 
        VALUES ('$p_name','$p_desc','$target_file', '$p_price','$p_category', '$p_brand', '$p_code', '$p_seller','$p_currency', '$p_stock')";

    $query_test = "INSERT INTO `products` (`product_name`, `product_description`, `product_image`, `product_price`, `product_category`, `product_brand`, `product_code`, `product_seller`, `currency`, `stock`) 
        VALUES ('$p_name', '$p_desc', '$target_file', '$p_price', '$p_category', '$p_brand', '$p_code', '$p_seller', '$p_currency', '$p_stock')";

    $insert_product = "INSERT INTO products (product_name, product_desc, product_image, product_price, product_category, product_brand, product_code, product_seller, currency, stock) 
        VALUES ('$p_name', '$p_desc', '$target_file', '$p_price', '$p_category', '$p_brand','$p_code', '$p_seller', '$p_currency', '$p_stock')";
    
    if(mysqli_query($conn, $insert_product)) {
        $msg = "Product Added to the database successfully";
    }
    else {
        $msg = 'Failed to add the product in the database! <br>
            <b class="text-danger">' . mysqli_error($conn) . '</b>';
    }
}

?>
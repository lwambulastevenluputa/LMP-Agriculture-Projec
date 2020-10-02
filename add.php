<?php 

    require 'config.php';

    if(isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = 1;

        $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
        $stmt->bind_param("s", $pcode);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $code = isset( $row['product_code']);

        // if product code is not present in the cart table
        if(!$code) {
            $insert_query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)");
            $insert_query->bind_param("sssiss", $pname,$pprice,$pimage,$pqty,$pprice,$pcode);
            $insert_query->execute();

            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Item added to your cart!</strong>
                  </div>';
        }
        // if product code is present in the cart table
        else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Item already added to your cart</strong>
                  </div>';
        }

    }
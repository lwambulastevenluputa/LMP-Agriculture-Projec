<?php 

    session_start();
    require 'database/db_connection.php';

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

    // shows the number of items in the shopping cart
    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
        $stmt = $conn->prepare("SELECT * FROM cart");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;

        echo $rows;
    }

    // deletes an item from the shopping cart
    if(isset($_GET['remove'])) {
        $id = $_GET['remove'];

        $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from the cart';
        header('location:cart.php');     
    }

    // removing all items from the cart
    if(isset($_GET['clear'])) {
        $stmt = $conn->prepare("DELETE FROM cart");
        $stmt->execute();
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All Items removed from the cart';
        header('location: cart.php');
    }

    // updating the price total when user changes the itemQty
    if(isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];

        $total_price = $qty*$pprice;

        $update_qty = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
        $update_qty->bind_param("isi", $qty,$total_price,$pid);
        $update_qty->execute();
    }

    // Collecting the order details of customer when they place an order in checkout page
    if(isset($_POST['action']) && !empty($_POST['action']) && isset($_POST['action']) == 'order') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];       
        $province = $_POST['state'];                 
        $zip = $_POST['zip'];                 
        $country = $_POST['country'];                   
        $more_instructions = $_POST['more-instructions'];

        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $pmode = $_POST['pmode'];

        $data = '';

        $stmt = $conn->prepare("INSERT INTO orders (name,email,phone,address1,address2,city,state,zip,country,more_instructions,pmode, products, amount_paid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        if(!$stmt) : 
            echo $conn->error;
            die(); 
        endif;
        $stmt->bind_param("sssssssssssss", $name,$email,$phone,$address1,$address2,$city,$province,$zip,$country,$more_instructions,$pmode,$products,$grand_total);
        $stmt->execute();
        $data .= '<div class="text-center">
                    <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                    <h2 class="text-success">Your order has been placed successfully!</h2>
                    <h4 class="bg-danger text-light roundeed p-2">Items Purchased : '.$products.'</h4>
                    <h4>Your Name : '.$name.'</h4>
                    <h4>Your Email : '.$email.'</h4>
                    <h4>Your Phone : '.$phone.'</h4>
                    <h4>Total Amount Paid : '.number_format($grand_total,2).'</h4>
                    <h4>Payment Mode : '.$pmode.'</h4>
                </div>';
        echo $data;
    }
?>
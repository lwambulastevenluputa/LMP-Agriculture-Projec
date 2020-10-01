<?php
    session_start();
    include 'database/connect.php';
    include 'views/layout/header_v2.php';
    //include 'views/header.php';
    //include 'views/navbar.php'; 

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        
        if(!$result) : 
            echo 'Error Querying Database..... ' . mysqli_error($conn); 
            die(); 
        endif;

        $row = mysqli_fetch_array($result);

        // accessing the values in the db and assigning them to their respective variables
        $p_name = $row['product_name'];
        $p_price = $row['product_price'];
        $p_image = $row['product_image'];
        $p_code = $row['product_code'];
        $p_desc = $row['product_description'];
        $p_cat = $row['product_category'];
        
        $p_seller = $row['product_seller'];
        
        //$availabity = $row['availability'];
        //$condition = $row['condition'];
        $brand = $row['product_brand'];
        $shipping_type = $row['shipping_type'];
        $provinces = $row['provinces'];
        $towns = $row['cities_towns'];
        $date = $row['created_at'];

        // create the two vairables
        $delivery_charge = 50;
        $total_price = $p_price + $delivery_charge;
    }
    else {
        echo 'No product found!';
    }
?>

    <div class="container top-padding-60">
		
        <div id="message"></div>
        
        <div class="row mt-4 pb-3">
            <!-- Sidebar (Product Header)-->
            <div class="col-lg-3">
                <?php include 'views/layout/aside-cat.php'; ?>
            </div>
            <!-- Main Content (Page Content) -->
            <div class="col-sm-9 mb-4 mt-4">
                <?php include 'views/components/product_info.php'; ?>
                <?php include 'views/components/nav_tab.php'; ?>
				<?php //include 'views/components/category_tab.php'; ?>	
				<?php include 'views/components/recommended_items.php'; ?>	
            </div>
        </div>

    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <script type="text/javascript">
        $(document).ready(function(){
        
            $(".addItemBtn").click(function(e){
                // prevent the page from refreshing when you press addToCart button
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcode = $form.find(".pcode").val();
                var currency = $form.find(".currency").val();
            
                $.ajax({
                    url: 'addToCart.php',
                    method: 'post',
                    data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
                    success:function(response) {
                        $("#message").html(response);
                        window.scrollTo(0,0);
                        load_cart_item_number();
                    }
                });
            });
        
            load_cart_item_number();
        
            function load_cart_item_number() {
                $.ajax({
                    url: 'addToCart.php',
                    method: 'get',
                    data: {cartItem: "cart_item"},
                    success: function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>
<?php include 'views/layout/footer_v2.php'; ?>
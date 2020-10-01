<?php
    session_start();
    require 'config.php';
    include 'includes/header.php';
    include 'includes/navbar.php'; 
?>



<div class="container-fluid top-padding-60">
<h3 class="text-center text-light bg-mango-orange p-2">Advanced Product Filter</h3>
    <div class="row">
        <div class="col-lg-3">
            <h5>Filter Product</h5>
            <hr>
            <h6 class="text-mango-orange">Select Brand</h6>
            <ul>
                <?php 
                    $query = "SELECT DISTINCT brand FROM products ORDER BY brand";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()) {
                ?>
                <li class="list-group-item">
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input product_check" id="brand" value="<?= $row['brand']; ?>"><?= $row['brand']; ?>
                        </label>
                    </div>
                </li>
                <?php  } ?>
            </ul>
        </div>
        <div class="col-lg-9">
            <h5 class="text-center" id="textChange">All Products</h5>
            <hr>
            <!-- Loader -->
            <div class="text-center">
                <img src="img/" alt="" id="loader" width="200" style="display:none;">
            </div>
            <div class="row" id="result">
                <?php 
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <div class="card border-secondary">
                                <img src="<?= $row['product_image']; ?>" alt="" class="card-img-top">
                                <div class="card-img-overlay">
                                    <h6 class="text-light bg-info" class="text-light bg-info text-center rounded p1"><?= $row['product_name'] ?></h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text-danger">Price : <?= number_format($row['product_price']); ?></h4>
                                </div>
                                <p>
                                    RAM : <?= $row['ram']; ?>
                                    HDD : <?= $row['hdd']; ?>
                                    Processor : <?= $row['processor']; ?>
                                    Screen Size : <?= $row['screen_size']; ?>
                                    OS : <?= $row['os']; ?>
                                </p>
                                <a href="" class="btn btn-success btn-block">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
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

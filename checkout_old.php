<?php 

    include 'database/db_connection.php';

    $grand_total = 0;
    $allItems = '';
    $items = array();

    $query = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $grand_total += $row['total_price'];
        $items[] = $row['ItemQty'];
    }

    // Join array elements with a string
    $allItems = implode(", ", $items);
?>

<?php 
    include 'views/header.php'; 
    include 'views/navbar.php'; 
?>

        <div class="container top-padding-60">
            <div class="row justify-content-center">
                <div class="col-lg-6 px-4 pb-4" id="order">
                    <h4 class="text-center text-mango-orange p-2">Complete your order!</h4>
                    <!-- Jumbotron -->
                    <div class="jumbotron p-3 mb-2 text-center">
                        <h6 class="lead"><b>Products(s) : </b><?= $allItems; ?></h6>
                        <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
                        <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?></h5>
                    </div>

                    <!-- Delivery Form -->
                    <form action="" method="post" id="placeOrder">
                        <!-- User Details -->
                        <input type="hidden" name="products" value="<?= $allItems; ?>">
                        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Enter E-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                        </div>
                        <div class="form-group">
                            <textarea name="address" id="" cols="10" rows="3" class="form-control" placeholder="Enter Delivery Address Here...."></textarea>
                        </div>

                        <!-- Payment Method -->
                        <h6 class="text-center lead">Select Payment Mode</h6>
                        <div class="form-group">
                            <select name="pmode" id="" class="form-control">
                                <option value="" selected disabled>-Select Payment Mode-</option>
                                <option value="cod">Cash On Delivery</option>
                                <option value="netbanking">Net Banking</option>
                                <option value="cards">Debit/Credit Card</option>
                            </select>
                        </div>
                        <!-- Place Order Button -->
                        <div class="form-group">
                            <input type="submit" name="submit" value="Place Order" class="btn bg-mango-orange btn-block">
                        </div>
                    </form>
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

            $("#placeOrder").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'addToCart.php',
                    method: 'post',
                    data: $('form').serialize()+"&action=order",
                    success: function(response){
                        $("#order").html(response);
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
    </body>
</html>
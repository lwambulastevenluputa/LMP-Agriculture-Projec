<?php 
    session_start();
    include 'views/layout/header_v2.php';
?>

        <div class="container top-padding-60">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div style="display:<?php if(isset($_SESSION['showAlert'])) {echo $_SESSION['showAlert'];} else { echo 'none'; } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-4">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php if(isset($_SESSION['message'])) {echo $_SESSION['message'];} unset($_SESSION['message']); ?></strong>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center text-mango-orange m-0">Products in your cart!</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>
                                        <a href="" class="badge-danger badge p-1" onclick="return confirm('Are you sure you want to clear you cart')">
                                            <i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'database/db_connection.php';
                                    $stmt = $conn->prepare("SELECT * FROM cart");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $grand_total = 0;
                                    while($row = $result->fetch_assoc()):
                                ?>
                                <tr>
                                    <!-- id coloumn -->
                                    <td><?= $row['id'] ?></td>
                                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                    <!-- image coloumn -->
                                    <td><img src="<?= $row['product_image'] ?>" alt="" width="50"></td>
                                    <!-- product_name coloumn -->
                                    <td><?= $row['product_name'] ?></td>
                                    <!-- product_price coloumn -->
                                    <td>ZMW<?= number_format($row['product_price'],2); ?></td>
                                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                    <!-- Quantity coloumn -->
                                    <td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
                                    <!-- Total Price coloumn -->
                                    <td>ZMW<?= number_format($row['total_price'],2); ?></td>                                  
                                    <!-- delete cart coloumn -->
                                    <td><a href="addToCart.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure you want to delete this product you cart')">
                                        <i class="fas fa-trash"></i></i></a>
                                    </td>

                                </tr>
                                <?php $grand_total += $row['total_price'] ?>
                                <?php endwhile ?>
                                
                                <tr>
                                    <!-- continue shopping column -->
                                    <td colspan="3">
                                        <a href="index.php" class="btn btn-success">
                                            <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping
                                        </a>
                                    </td>
                                    <!-- grand total col -->
                                    <td colspan="2"><b>Grand Total</b></td>
                                    <!-- total price to pay -->
                                    <td><b>ZMW<?= number_format($grand_total,2); ?></b></td>
                                    <!-- checkout -->
                                    <td>
                                        <a href="checkout.php" class="btn bg-mango-orange <?= ($grand_total > 1)? "" : "disabled" ?>">
                                            <i class="far fa-credit-card">&nbsp;&nbsp;Checkout</i>
                                        </a>
                                    </td>
                                </tr>      
                            </tbody>
                        </table>
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

            $(".itemQty").on('change', function(){
                var $el = $(this).closest('tr');// this is becz all the hidden input we want to access are in the tr element
                
                var pid = $el.find(".pid").val();
                var pprice = $el.find(".pprice").val(); 
                var qty = $el.find(".itemQty").val(); 
                
                console.log(qty);
                location.reload(true);
                
                $.ajax({
                    url: 'addToCart.php',
                    method: 'post',
                    cache: false,
                    data: {qty:qty, pid:pid, pprice:pprice},
                    success: function(response){
                        console.log(response);
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
<?php //include 'views/layout/footer_v2.php'; ?>

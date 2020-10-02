<?php
include 'database/db_connection.php';
$a = "SELECT * FROM products WHERE product_name LIKE '%" . $_POST['searchterm'] . "%'";
$stmt = $conn->prepare($a);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) : ?>
<div class="col-sm-12 col-md-6 col-lg-3">
    <div id="product" class="product-image-wrapper">
        <div class="single-product">
            <div class="productinfo text-center">
                <a href="product_details.php?id=<?php echo $row['id'] ?>"><img src="<?= $row['product_image'] ?>" alt=""
                        class="card-img-top" height="250"></a>
                <h2>ZMW <?= number_format($row['product_price'], 2) ?></h2>
                <p class="mb-1"><?= $row['product_name'] ?></p>
                <p class="text-success mb-1"><?= $row['product_seller'] ?></p>
            </div>
            <div class="p-2">
                <form action="" class="form-submit">
                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                    <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                    <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                    <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                    <input type="hidden" class="currency" value="<?= $row['currency'] ?>">
                    <!-- <a href="" class="btn btn-default add-to-cart addItemBtn text-center"><i class="fas fa-cart-plus"></i>Add to cart</a> -->
                    <button class="btn btn-block add-to-cart addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add
                        to cart</button>
                </form>
            </div>
        </div>
        <div class="choose">
            <ul class="unstyled d-flex p-2 mb-0">
                <li class="mr-auto"><a href="#"><i class="fa fa-plus-square"></i> Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i> Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>
<?php endwhile; ?>
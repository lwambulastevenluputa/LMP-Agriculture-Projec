<div class="container top-padding-60">
        <div id="message"></div>
        <div class="row mt-4 pb-3">
        
            <div class="col-lg-3">
                <?php include 'template/aside-cat.php'; ?>
            </div>

            <div class="col-sm-9 mb-4">
                <div class="container">
                <h2 class="title text-center">Featured Items</h2>
                <p>whats good my g</p>
                    <div class="row">
                       
                        <?php 
                            include 'db_connection.php';
                            $stmt = $conn->prepare("SELECT * FROM products");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if($result->num_rows === 0) exit('No rows');
                            while($row = $result->fetch_assoc()):               
                        ?>
                        <div class="col-sm-4">
                            <div id="product" class="product-image-wrapper">
                                <div class="single-product">
                                    <div class="productinfo text-center">
                                        <img src="<?= $row['product_image'] ?>" alt="" class="card-img-top" height="250">
                                        <h2>ZMW <?= number_format($row['product_price'],2); ?></h2>
                                        <p><?= $row['product_name']; ?></p>
                                    </div>
                                    <div class="p-2">
                                        <form action="" class="form-submit">
                                            <input type="hidden" class="pid" value="<?= $row['product_id']; ?>">
                                            <input type="hidden" class="pname" value="<?= $row['product_name']; ?>">
                                            <input type="hidden" class="pprice" value="<?= $row['product_price']; ?>">
                                            <input type="hidden" class="pimage" value="<?= $row['product_image']; ?>">
                                            <input type="hidden" class="pcode" value="<?= $row['product_code']; ?>">
                                            <input type="hidden" class="currency" value="<?= $row['currency'] ?>">
                                            <!-- <a href="" class="btn btn-default add-to-cart addItemBtn text-center"><i class="fas fa-cart-plus"></i>Add to cart</a> -->
                                            <button class="btn btn-block add-to-cart addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
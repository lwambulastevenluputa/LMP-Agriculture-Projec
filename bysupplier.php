<?php
session_start();
include 'views/layout/header_v2.php';

?>



<style>
#recentlyviewed {
    /* color: #FE980F; */
    font-size: 18px;
    font-weight: 700;
    margin: 0 15px;
    text-transform: uppercase;
    margin-bottom: 15px;
    position: relative;
}

#recentscroll::-webkit-scrollbar {
    width: 5px;
}

#recentscroll::-webkit-scrollbar-track {

    background: #DCDCDC;
}

#recentscroll::-webkit-scrollbar-thumb {
    background: grey;
}
</style>


<div class="container-fluid top-padding-50">
    <div class="row" style="width:90%; margin-left:5%;">
        <div class="col-lg-2">
            <?php include 'views/layout/aside-cat.php'; ?>
        </div>

        <div class="col-lg-10 col-md-12">
            <h3 class="sticky" id="recentlyviewed"> Shop by Suppliers</h3>
            <hr>


            <div style="display: flex;">

                <div style="padding-top:100px;margin-right:15px;">
                    <i class="fas fa-arrow-circle-left fa-3x" id="horizon-prev-6"></i>
                </div>

                <div class="container forcategory" id="vert-scroll-cont-6">
                    <div id="category-cards-scroll" style="display: flex;">


                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Fruit & Veg</h3>
                        </div>


                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Poultry</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Beef Products</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 9</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 8</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 1</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 2</h3>
                        </div>

                        <div class="card">
                            <h3>Supplier 3</h3>
                        </div>

                        <div class="card">
                            <h3>Supplier 4</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 5</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 6</h3>
                        </div>

                        <div class="card">
                            <img src="img/farmer.png" style="width: 50%;" />
                            <h3>Supplier 7</h3>
                        </div>


                    </div>
                </div>
                <div style="padding-top:100px; padding-left:15px;">
                    <i class="fas fa-arrow-circle-right fa-3x" id="horizon-next-6"></i>
                </div>

            </div>

            <script>
            $('#horizon-prev-6').click(function() {
                event.preventDefault();
                $('#vert-scroll-cont-6').animate({
                    scrollLeft: "-=500px"
                }, "slow");
            });

            $('#horizon-next-6').click(function() {
                event.preventDefault();
                $('#vert-scroll-cont-6').animate({
                    scrollLeft: "+=500px"
                }, "slow");
            });
            </script>



            <div id="recentscroll" style=" height:fit-content; overflow-y:hidden; overflow-x:hidden; padding
            :10px 15px; ">


                <div class="row" id="result">

                    <?php
                    include 'database/db_connection.php';
                    $stmt = $conn->prepare("SELECT * FROM products");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div id="product" class="product-image-wrapper">
                            <div class="single-product">
                                <div class="productinfo text-center">
                                    <a href="product_details.php?id=<?php echo $row['id'] ?>"><img
                                            src="<?= $row['product_image'] ?>" alt="" class="card-img-top"
                                            height="250"></a>
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
                                        <button class="btn btn-block add-to-cart addItemBtn"><i
                                                class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endwhile; ?>

                </div><!-- End Row -->

            </div>



        </div>
    </div>

    <style>
    #recentscroll .card img {
        height: 150px;
    }

    #recentscroll .card {
        height: fit-content;
    }

    @media screen and (max-width: 500px) {
        #recentscroll::-webkit-scrollbar {
            display: none;
        }

        #recentscroll .column {
            width: 100%;
        }
    }
    </style>



    <hr align="center" style="width: 80%;">


    <div class="container" id="farm-market-cont">
        <div>
            <h5>Farmers Market</h5>
            <p>Browse through different products and negotiate for a good deal.</p>
        </div>
        <div id="title-line"></div>
        <a href="404.php">
            <h4>See all <i class="fal fa-arrow-right"></i></h4>
        </a>
    </div>



    <br><br><br>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JS Script to show the number of items in user's cart -->
    <script src="assets/js/num_cart_items.js"></script>
    <script src="assets/js/product_filter.js"></script>



    <?php include 'views/layout/footer_v2.php'; ?>
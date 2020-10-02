<?php
session_start();
include 'views/layout/header_v2.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//database connection
require_once 'database/connect_pdo.php';

if (isset($_POST['records-limit'])) {
    $_SESSION['records-limit'] = $_POST['records-limit'];
}

// Dynamic limit [define how many results you want per page]
// $results_per_page = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 9;
$results_per_page = 9;

// Get total records [find out the number of results(rows) stored in database]
$query = $conn->query("SELECT count(id) AS id FROM products")->fetchAll();
$number_of_records = $query[0]['id'];

// Calculate total pages [determine number of total pages available]
$number_of_pages = ceil($number_of_records / $results_per_page);

// Current pagination page number [determine which page number visitor is currenct on]
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
// if (!isset($_GET['page'])) {
//     $page = 1;
// } else {
//     $page = $_GET['page'];
// }

// Prev + Next 
$prev = $page - 1;
$next = $page + 1;

// Offset [determine the sql LIMIT starting number for the results on the displaying page]
$paginationStart = ($page - 1) * $results_per_page;

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


<div class="container" id="farm-market-cont">
    <div>
        <h4>Todays Deals</h4>
        <p>Take a look at the greatd deals on different products right here.</p>
    </div>
    <div id="title-line"></div>
    <div style="margin-left: 20px;">
        <h4>Instant Promos</h4>
        <p>Check out the promotions on different products right here.</p>
    </div>
</div>


<div class="container-fluid top-padding-50">
    <div class="row" style="width:90%; margin-left:5%;">
        <div class="col-lg-2">
            <?php include 'views/layout/aside-cat.php'; ?>
        </div>

        <div class="col-lg-10 col-md-12">
            <!-- Select dropdown [Record-Limit] -->
            <div class="in-line d-flex bd-highlight mb-3">
                <h2 id="textChange" class="title pt-2 mr-auto">Deals & Promos</h2>
                <form action="byproducts.php" method="post">
                    <select name="records-limit" id="records-limit" class="custom-select">
                        <option disabled selected>Records Limit</option>
                        <?php foreach ([5, 7, 10, 12] as $limit) : ?>
                        <option
                            <?php if (isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                            value="<?= $limit; ?>">
                            <?= $limit; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>

            <div class="text-center">
                <!-- <img src="images/loader.gif" alt="" id="loader" width="200" style="display: none;"> -->
                <p id="loader" style="display: none;">Loading....</p>
            </div>
            <hr>


            <div id="recentscroll" style=" height:fit-content; overflow-y:hidden; overflow-x:hidden; padding
            :10px 15px; ">


                <div class="row" id="result">
                    <?php
                    include 'database/db_connection.php';
                    $stmt = $conn->prepare("SELECT * FROM products LIMIT $paginationStart, $results_per_page");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
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

                <!-- Pagination -->
                <nav aria-label="Page navigation mt-5 text-center" id="changeitempage">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if ($page <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($page <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?page=" . $prev;
                                                        } ?>">Previous</a>
                        </li>

                        <?php for ($i = 1; $i <= $number_of_pages; $i++) : ?>
                        <li class="page-item <?php if ($page == $i) {
                                                        echo 'active';
                                                    } ?>">
                            <a class="page-link" href="byproducts.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                        </li>
                        <?php endfor; ?>

                        <li class="page-item <?php if ($page >= $number_of_pages) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($page >= $number_of_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?page=" . $next;
                                                        } ?>">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>






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

    <style>
    #changeitempage {
        background-color: #f8f9f9;
        display: flex;
        justify-content: center;
    }

    #changeitempage li {
        margin: 0;
    }
    </style>



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
<?php
session_start();

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//database connection
require_once 'database/connect_pdo.php';

if(isset($_POST['records-limit'])){
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
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
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

    include 'views/layout/header_v2.php';
?>
    <div class="container top-padding-50">
        <div id="message"></div>
        <div class="row mt-4 pb-3">
            <div class="col-lg-3">
                <?php include 'views/layout/aside-cat.php'; ?>
            </div>

            <div class="col-sm-9 mb-4">
                    

                     <!-- Select dropdown [Record-Limit] -->
                    <div class="in-line d-flex bd-highlight mb-3">
                        <h2 id="textChange" class="title pt-2 mr-auto">All Products</h2>
                        <form action="index.php" method="post">
                            <select name="records-limit" id="records-limit" class="custom-select">
                                <option disabled selected>Records Limit</option>
                                <?php foreach([5,7,10,12] as $limit) : ?>
                                <option
                                    <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
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
                    <div class="row" id="result">           
                        <?php 
                            include 'database/db_connection.php';
                            $stmt = $conn->prepare("SELECT * FROM products LIMIT $paginationStart, $results_per_page");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while($row = $result->fetch_assoc()): ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div id="product" class="product-image-wrapper">
                                <div class="single-product">
                                    <div class="productinfo text-center">
                                        <a href="product_details.php?id=<?php echo $row['id'] ?>"><img src="<?= $row['product_image'] ?>" alt="" class="card-img-top" height="250"></a>
                                        <h2>ZMW <?= number_format($row['product_price'],2) ?></h2>
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
                                            <button class="btn btn-block add-to-cart addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
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

                    </div><!-- End Row -->

                    <!-- Pagination -->
                    <nav aria-label="Page navigation mt-5 text-center">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                                <a class="page-link"
                                    href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                            </li>

                            <?php for($i = 1; $i <= $number_of_pages; $i++ ): ?>
                            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                                <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                            </li>
                            <?php endfor; ?>
                            
                            <li class="page-item <?php if($page >= $number_of_pages) { echo 'disabled'; } ?>">
                                <a class="page-link"
                                    href="<?php if($page >= $number_of_pages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
            </div>
            
        </div>

        
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!-- JS Script to show the number of items in user's cart -->
    <script src="assets/js/num_cart_items.js"></script>
    <script src="assets/js/product_filter.js"></script>

    <script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
    </script>

<?php include 'views/layout/footer_v2.php';?>
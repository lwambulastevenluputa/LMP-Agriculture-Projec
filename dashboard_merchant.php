<!-- 
    Farmer dashboard
    1. show a link "Add New Product" - opens new-product.php (add.php)
        for adding a new product in a shop
        status shall be false by default, waiting for admin to approve.php or reject.php : only approved products shall be listed in marketplace
    
    Admin dashboard
    2. list all products added by the loged-in seller (product image, title, price and status only)
    3. The last column shall be "actions" : delete(product-delete.php) & update(product-update.php) product link
 -->

<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // echo $_SESSION["loggedin"];
    header("location: signin.php");
    exit;
}




// create a database connection
include 'database/connect.php';
// import views
include 'dashboard/views/head.php';
include 'dashboard/views/top-navbar.php';
include 'dashboard/views/sidebar.php';
?>

<body class="sb-nav-fixed">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="d-flex justify-content-between p-2">
                                <i class="fa fa-fw fa-shopping-cart display-4"></i>
                                <p>Orders</p>
                            </div>
                            <div class="card-body pt-0"><span class="display-4">323</span></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="d-flex justify-content-between p-2">
                                <i class="fa fa-fw fa-list display-4"></i>
                                <p>Revenue</p>
                            </div>
                            <div class="card-body pt-0">$<span class="display-4">54,300</span> </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="d-flex justify-content-between p-2">
                                <i class="fas fa-users  display-4"></i>
                                <p>Visitors</p>
                            </div>
                            <div class="card-body pt-0"><span class="display-4">523</span> </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="d-flex justify-content-between p-2">
                                <i class="fas fa-fw fa-comments  display-4"></i>
                                <p>Reviews</p>
                            </div>
                            <div class="card-body pt-0"><span class="display-4">2,000</span></div>
                        </div>
                    </div> -->
                </div>

                <?php include 'dashboard/views/area-bar-chart.php'; ?>

                <!-- Products Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        My Shop
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name of Product</th>
                                        <th>Product Category</th>
                                        <th>Seller</th>
                                        <th>Price of Product</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query = 'SELECT * FROM products';
                                    if (mysqli_query($conn, $query)) {
                                        echo "";
                                    } else {
                                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                    }

                                    $count = 1;
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['product_name']; ?></td>
                                        <td><?= $row['product_category']; ?></td>
                                        <td><?= $row['product_seller']; ?></td>
                                        <td><?= '<p class="">ZMW' . ' ' . number_format($row['product_price'], 2) . '</p>'; ?>
                                        </td>
                                        <td>
                                            <?php
                                                    if ($row['status'] == 0) {
                                                        echo '<div class="badge badge-danger p-2">Not Approved</div>';
                                                    } else {
                                                        echo '<div  class="badge badge-success p-2">Approved</div>';
                                                    }
                                                    ?>
                                        </td>
                                    </tr>
                                    <?php
                                            $count++;
                                        }
                                    } else {
                                        echo '0 results';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; MangoChat <?= date('Y'); ?></div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>
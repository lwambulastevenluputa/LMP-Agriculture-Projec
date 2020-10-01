<?php 
    // create a database connection
    include 'config/db_connection.php'; 

    // import templates
    include 'template/head.php'; 
    include 'template/top-navbar.php'; 
    include 'template/sidebar.php'; 
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
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <i class="fa fa-fw fa-shopping-cart display-4"></i>
                                    <div class="card-body"><span class="display-4">123</span> Orders</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                <i class="fa fa-fw fa-list  display-4"></i>
                                    <div class="card-body">$<span class="display-4">540,000</span> Revenue</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                <i class="fas fa-users  display-4"></i>
                                    <div class="card-body"><span class="display-4">523</span> Visitors</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                <i class="fas fa-fw fa-comments  display-4"></i>
                                    <div class="card-body"><span class="display-4">2000</span> Reviews</div>
                                </div>
                            </div>
                        </div>

                        <?php include 'template/area-bar-chart.php'; ?>
                        
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
                                            if(mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) { ?>              
                                                    <tr>
                                                        <td><?= $row['product_id']; ?></td>
                                                        <td><?= $row['product_name']; ?></td>
                                                        <td><?= $row['product_cat']; ?></td>
                                                        <td><?= $row['seller']; ?></td>
                                                        <td><?= '<p class="">ZMW' .' '. number_format($row['product_price'],2) . '</p>'; ?></td>
                                                        <td>
                                                            <?php 
                                                                if($row['status'] == 0) {
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
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

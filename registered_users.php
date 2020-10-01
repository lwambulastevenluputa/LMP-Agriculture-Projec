<?php 
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: signin.php");
        exit;
    }
    // create a database connection
    include 'database/connect.php'; 

    // import templates
    include 'dashboard/views/head.php'; 
    include 'dashboard/views/top-navbar.php'; 
    include 'dashboard/views/sidebar.php'; 
?>


<body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Clients </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard / Registered Users</li>
                        </ol>
                        

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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 

                                            $query = 'SELECT * FROM users';
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
                                                        <td><?= $row['id']; ?></td>
                                                        <td><?= $row['first_name']; ?></td>
                                                        <td><?= $row['last_name']; ?></td>
                                                        <td><?= $row['username']; ?></td>
                                                        <td><?= $row['email']; ?></td>
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
                            <div class="text-muted">Copyright &copy; MangoChat 2020</div>
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

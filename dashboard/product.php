<?php
    include('controllers/pserver.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    </head>
        <body class="fixed-nav sticky-footer bg-dark" id="page-top">

            <?php  include 'template/navbar.php'; ?>
            
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Product Page</li>
                    </ol>
                    <div class="row">
                        <div class="col-12">
                            <h1>Create Product </h1>
                        </div>
                        <div class="col-md-8">
                            <form method="post" action="product.php">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="pname" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" class="form-control"  name="pirce" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Catgory</label>
                                    <input type="text" class="form-control" name="pcat" required>
                                </div>
                                    <div class="form-group">
                                    <label>Product Details</label>
                                    <textarea class="form-control" name="pdetails" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="reg_p">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © Your Website 2018</small>
                    </div>
                </div>
            </footer>
            
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin.min.js"></script>
        </div>
    </body>
</html>
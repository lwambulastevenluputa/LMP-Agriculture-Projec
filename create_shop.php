<?php 
    include 'template/header.php'; 
    include 'template/navbar.php'; 
?>
    <div class="container top-padding-60">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 rounded f2f2f2">
                <h2 class="text-center p-2">Create a Seller Account</h2>
                <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Business Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="business_address" placeholder="Business Address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>  
                    <div class="form-group">
                        <input type="password" name="passwd" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-block" value="Create Merchant Accout" required>
                    </div>
                    <div class="form-group">
                        <h4 class="text-center"><?//= $msg; ?></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    </body>
</html>
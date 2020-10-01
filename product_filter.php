<?php 
    include 'database/connect_oop.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produt Listing</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
    <body>
        <h3 class="text-center text-light bg-info p-2 d-none">
            Advanced Product Filter Using Bootstrap 4, PHP, MySQLi & Ajax
        </h3>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>
                    <!-- Brands -->
                    <h6 class="text-info">Select Brand</h6>
                    <ul class="list-group">
                        <?php 
                            $sql = "SELECT DISTINCT brand FROM laptops ORDER BY brand";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input id="brand" class="form-check-input product_check" type="checkbox" value="<?= $row['brand']; ?>"> <?= $row['brand']; ?>
                                        </label>
                                    </div>
                                </li>
                        <?php endwhile; ?>      
                    </ul>

                    <!-- RAM -->
                    <h6 class="text-info">Select RAM</h6>
                    <ul class="list-group">
                        <?php 
                            $sql = "SELECT DISTINCT ram FROM laptops ORDER BY ram";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input id="ram" class="form-check-input product_check" type="checkbox" value="<?= $row['ram']; ?>"> <?= $row['ram']; ?>
                                        </label>
                                    </div>
                                </li>
                        <?php endwhile; ?>      
                    </ul>

                    <!-- HDD -->
                    <h6 class="text-info">Select HDD</h6>
                    <ul class="list-group">
                        <?php 
                            $sql = "SELECT DISTINCT hdd FROM laptops ORDER BY hdd";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input id="hdd" class="form-check-input product_check" type="checkbox" value="<?= $row['hdd']; ?>"> <?= $row['hdd']; ?>
                                        </label>
                                    </div>
                                </li>
                        <?php endwhile; ?>      
                    </ul>

                    <!-- Processors -->
                    <h6 class="text-info">Select Processor</h6>
                    <ul class="list-group">
                        <?php 
                            $sql = "SELECT DISTINCT processor FROM laptops ORDER BY processor";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input id="processor" class="form-check-input product_check" type="checkbox" value="<?= $row['processor']; ?>"> <?= $row['processor']; ?>
                                        </label>
                                    </div>
                                </li>
                        <?php endwhile; ?>      
                    </ul>

                    <!-- Screen Size -->
                    <h6 class="text-info">Select Screen Size</h6>
                    <ul class="list-group">
                        <?php 
                            $sql = "SELECT DISTINCT screen_size FROM laptops ORDER BY screen_size";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input id="screen_size" class="form-check-input product_check" type="checkbox" value="<?= $row['screen_size']; ?>"> <?= $row['screen_size']; ?>
                                        </label>
                                    </div>
                                </li>
                        <?php endwhile; ?>      
                    </ul>

                    <!-- OS -->
                    <h6 class="text-info">Select OS</h6>
                    <ul class="list-group">
                        <?php 
                            $sql = "SELECT DISTINCT os FROM laptops ORDER BY os";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input id="os" class="form-check-input product_check" type="checkbox" value="<?= $row['os']; ?>"> <?= $row['os']; ?>
                                        </label>
                                    </div>
                                </li>
                        <?php endwhile; ?>      
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <!-- <img src="images/loader.gif" alt="" id="loader" width="200" style="display: none;"> -->
                        <p id="loader" style="display: none;">Loading....</p>
                    </div>
                    <div class="row" id="result">
                        <?php 
                            $sql = "SELECT * FROM laptops";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) : ?>
                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <!-- <img src="<?//= $row['product_image']; ?>" alt="Product Image" class="card-img-top"> -->
                                    <div class="card-img-overlay">
                                        <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1"><?= $row['product_name']; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger">Price: <?= number_format($row['product_price']); ?></h4>
                                        <p>
                                            RAM : <?= $row['ram'] ?><br>
                                            HDD : <?= $row['hdd'] ?><br>
                                            Processor : <?= $row['processor'] ?><br>
                                            Screen Size : <?= $row['screen_size'] ?><br>
                                            OS : <?= $row['os'] ?><br>
                                        </p>
                                        <a href="#" class="btn btn-success btn-block">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="assets/js/product_filter_old.js"></script>
    </body>
</html>

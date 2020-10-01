<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mango Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbiton Slab Slab+Slab:wght@300;500&display=swap"
        rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" media="all" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css">

    <script src="https://kit.fontawesome.com/5255961736.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">

    <script src="jquery-3.5.1.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js">
    </script>

    <!-- <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/pagestyle.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Marmelad', sans-serif;
        padding-bottom: 50px;
    }
    </style>
</head>
<!--/head-->




<body>

    <?php
    session_start();
    include 'views/layout/header_v2.php';

    ?>
    <!-- <nav style="justify-content:space-between;">
            <button id="cancel-menu"> 🞬 </button>
            <div id="ul-1-div">
                <ul id="ul-1">

                    <li><a href="#"><i class="fa fa-phone"></i> <span id="company-mobile">+260 975 651 046</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-envelope"></i><span id="company-email">info@lendmepay.com</span></a>
                    </li>
                </ul>
            </div>
            <div id="ul-2-div">
                <ul>
              
    <li><a class="link" href="#">Buy</a></li>
    <li><a class="link" href="#">Bid</a></li>
    <li><a class="link" href="#">Hire</a></li>
    <li><a class="link" href="#">Sell</a></li>
    <li><a class="link" href="#">Watchlist</a></li>
    <li><a href="#"><i class="far fa-user-circle"></i></a></li>
    <li><a href="#"><i class="far fa-bell"></i></li>
    <li class="cart-icon"><a href="cart.php"><i class="fas fa-shopping-cart "></i><span id="cart-item" class="badge"
                style="color: #fff; background-color: #FE980F;"></span></a></li>
    </ul>
    </div>



    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="display: flex; background:#DCDCDC">
        <div class="logo" style="margin-right: auto;">
            <a class="navbar-brand" href="index.php"><img src="img/Logo.png" id="nav-logo" alt="" /></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="search__box">
            <form class="form-inline my-2 my-lg-0">
                <input type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>

        <div class="" id="navbarSupportedContent">

            <ul class="navbar-nav collapse navbar-collapse">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Market Prices</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Special Offers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Fixed Products</a>
                        <a class="dropdown-item" href="#">Best Offer Products</a>
                        <a class="dropdown-item" href="#">Auction Products</a>
                        <a class="dropdown-item" href="#">Promotion Products</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
    <script>
    /* only execute this script when the document is ready */
    $(document).ready(function() {
        /* function called when you click of the button */
        $("#cancel-menu").click(function() {

            /* this if else to change the text in the button */
            if ($("#cancel-menu").text() == "☰") {
                $("#cancel-menu").text("🞬");
            } else {
                $("#cancel-menu").text("☰");
            }

            /* this function toggle the visibility of our "li" elements */
            $("nav li").toggle("slow");
            $("nav #log-in").toggle("slow");
        });
    });
    </script>
    <div class="container">
        <ul class="unstyled categories-link d-flex justify-content-center" style="font-family: 'Marmelad', sans-serif;">
            <li><a href="#">Saved</a></li>
            <li><a href="#">Fruit & Veg</a></li>
            <li><a href="#">Livestock</a></li>
            <li><a href="#">Poultry</a></li>
            <li><a href="#">Fish</a></li>
        </ul>

    </div> -->

    <?php
    include 'views/components/slider2.php';
    ?>

    <div align="center" style="margin-top:50px;">
        <h3>Categories</h3>
    </div>
    <br>

    <div id="category-cards">
        <div class="row" id="homecat">
            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Fruit & Veg</h3>
                        <img src="img/carrot-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Poultry</h3>
                        <img src="img/chicken-2-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Beef Products</h3>
                        <img src="img/cow-2-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Pork Products</h3>
                        <img src="img/pig-4-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Fish</h3>
                        <img src="img/fish-7-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Goat Products</h3>
                        <img src="img/horse-4-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Rabits</h3>
                        <img src="img/rabbit-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Machinary</h3>
                        <img src="img/windmill-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Agro Dealers</h3>
                        <img src="img/shop-64.png" />
                    </div>
                </a>
            </div>

            <div class="column mb-4">
                <a href="byproducts.php">
                    <div class="card">
                        <h3>Dairy Products</h3>
                        <img src="img/cheese-64.png" />
                    </div>
                </a>
            </div>
        </div>
    </div>

    <hr align="center" style="width: 80%;">

    <div id="vert-scroll-title">
        <h4>Recently Viewed Items</h4>
        <div id="title-line"></div>
        <a href="recently_viewed.php">
            <h4>See all <i class="fal fa-arrow-right"></i></h4>
        </a>
    </div>

    <div style="display: flex;">




        <div style="padding-top:160px; padding-left: 20px;">
            <i class="fas fa-arrow-circle-left fa-3x" id="horizon-prev-1"></i>
        </div>


        <div class="container" id="vert-scroll-cont-1">
            <div id="result" style="display: flex;">
                <?php
                include 'database/db_connection.php';
                $stmt = $conn->prepare("SELECT * FROM products");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) : ?>

                <div id="product" class="product-image-wrapper">
                    <div class="single-product">
                        <div class="productinfo text-center">
                            <a href="product_details.php?id=<?php echo $row['id'] ?>"><img
                                    src="<?= $row['product_image'] ?>" alt="" class="card-img-top" height="250"></a>
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

                <?php endwhile; ?>

            </div><!-- End Row -->
        </div>


        <div style="padding-top:160px; padding-right: 20px;">
            <i class="fas fa-arrow-circle-right fa-3x" id="horizon-next-1"></i>
        </div>

    </div>

    <script>
    $('#horizon-prev-1').click(function() {
        event.preventDefault();
        $('#vert-scroll-cont-1').animate({
            scrollLeft: "-=500px"
        }, "slow");
    });

    $('#horizon-next-1').click(function() {
        event.preventDefault();
        $('#vert-scroll-cont-1').animate({
            scrollLeft: "+=500px"
        }, "slow");
    });
    </script>

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

    <hr align="center" style="width: 80%;">


    <div class="row" id="flexible-column-1">
        <div class="column" id="wallet-col">
            <div id="activate-wallet-info">
                <h4>Activate Your Wallet</h4>
                <p>You can transact securely right here using your wallet. Simply activate your wallet then add
                    money to
                    it
                    and begin to transact.</p>
                <br>
                <a href="404.php">
                    <h5>Activate my Wallet&nbsp;<i class="fal fa-arrow-right"></i></h5>
                </a>
            </div>
            <div id="activate-wallet-link">
                <h4>Need Assistance?</h4>
                <p>Send us an email or call our call center.</p>
                <br>
                <a href="404.php">
                    <h5>Contact us&nbsp;<i class="fal fa-arrow-right"></i></h5>
                </a>
            </div>
        </div>

        <hr id="popular-items-line" align="center" style="width: 80%;">
        <style>
        #popular-items-line {
            display: none;
        }

        @media screen and (max-width: 1200px) {
            #popular-items-line {
                display: block;
            }
        }
        </style>

        <div class="column" id="scroll-col-1">

            <div id="inner-vert-scroll-title">
                <h4>Popular Items</h4>
                <div id="title-line"></div>
                <a href="popular_items.php">
                    <h4 style="color: #222222;">See all <i class="fal fa-arrow-right"></i></h4>
                </a>
            </div>



            <div style="display: flex;">


                <div style="padding-top:160px;">
                    <i class="fas fa-arrow-circle-left fa-3x" id="horizon-prev-2"></i>
                </div>


                <div class="container" id="vert-scroll-cont-2">
                    <div id="result" style="display: flex;">
                        <?php
                        include 'database/db_connection.php';
                        $stmt = $conn->prepare("SELECT * FROM products");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) : ?>

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

                        <?php endwhile; ?>

                    </div><!-- End Row -->
                </div>

                <div style="padding-top:160px; margin-left:25px;">
                    <i class="fas fa-arrow-circle-right fa-3x" id="horizon-next-2"></i>
                </div>

            </div>

            <script>
            $('#horizon-prev-2').click(function() {
                event.preventDefault();
                $('#vert-scroll-cont-2').animate({
                    scrollLeft: "-=500px"
                }, "slow");
            });

            $('#horizon-next-2').click(function() {
                event.preventDefault();
                $('#vert-scroll-cont-2').animate({
                    scrollLeft: "+=500px"
                }, "slow");
            });
            </script>


        </div>
    </div>


    <hr align="center" style="width: 80%;">

    <div id="info-cards">
        <div class="row">
            <div class="column">
                <a href="404.php">
                    <div class="card">
                        <h3>Stay Connected</h3>
                        <p>Get into conversations and interact with buyers and sellers in the platform community</p>
                        <div id="info-cards-link">
                            <h5>Go to Community&nbsp;<i class="fal fa-arrow-right"></i></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="404.php">
                    <div class="card">
                        <h3>Make Bids</h3>
                        <p>Cant find what you are looking for? Go ahead and post what it is your are looking for and
                            specify your budget.</p>
                        <div id="info-cards-link">
                            <h5>Make a Bid&nbsp;<i class="fal fa-arrow-right"></i></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="404.php">
                    <div class="card">
                        <h3>Have it Delivered</h3>
                        <p>You can choose to have the products delivered to your address.
                            Its that easy!
                            Edit your shipping details and we will know how to reach you.</p>
                        <div id="info-cards-link">
                            <h5>Know More&nbsp;<i class="fal fa-arrow-right"></i></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="404.php">
                    <div class="card">
                        <h3>Track deliveries</h3>
                        <p>Keep track of your products and know where they are with our real-time tracking system.</p>
                        <div id="info-cards-link">
                            <h5>Know More&nbsp;<i class="fal fa-arrow-right"></i></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <hr align="center" style="width: 80%;">

    <div id="vert-scroll-title">
        <h4>Todays Deals</h4>
        <div id="title-line"></div>
        <a href="deals.php">
            <h4>See all <i class="fal fa-arrow-right"></i></h4>
        </a>
    </div>

    <div style="display: flex;">




        <div style="padding-top:160px; padding-left: 20px;">
            <i class="fas fa-arrow-circle-left fa-3x" id="horizon-prev-4"></i>
        </div>


        <div class="container" id="vert-scroll-cont-4">
            <div id="result" style="display: flex;">
                <?php
                include 'database/db_connection.php';
                $stmt = $conn->prepare("SELECT * FROM products");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) : ?>

                <div id="product" class="product-image-wrapper">
                    <div class="single-product">
                        <div class="productinfo text-center">
                            <a href="product_details.php?id=<?php echo $row['id'] ?>"><img
                                    src="<?= $row['product_image'] ?>" alt="" class="card-img-top" height="250"></a>
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

                <?php endwhile; ?>

            </div><!-- End Row -->
        </div>


        <div style="padding-top:160px; padding-right: 20px;">
            <i class="fas fa-arrow-circle-right fa-3x" id="horizon-next-4"></i>
        </div>

    </div>

    <script>
    $('#horizon-prev-4').click(function() {
        event.preventDefault();
        $('#vert-scroll-cont-4').animate({
            scrollLeft: "-=500px"
        }, "slow");
    });

    $('#horizon-next-4').click(function() {
        event.preventDefault();
        $('#vert-scroll-cont-4').animate({
            scrollLeft: "+=500px"
        }, "slow");
    });
    </script>





    <hr align="center" style="width: 80%;">

    <div id="vert-scroll-title">
        <h4>Shop by Supplier</h4>
        <div id="title-line"></div>
        <a href="bysupplier.php">
            <h4>See all <i class="fal fa-arrow-right"></i></h4>
        </a>
    </div>


    <div style="display: flex;">

        <div style="padding-top:100px;margin-left:20px;">
            <i class="fas fa-arrow-circle-left fa-3x" id="horizon-prev-6"></i>
        </div>

        <div class="container forcategory" id="vert-scroll-cont-6">
            <div id="category-cards-scroll" style="display: flex;">


                <div class="card">
                    <img src="img/farmer.png" style="width: 50%;" />
                    <h3>Supplier 10</h3>
                </div>


                <div class="card">
                    <img src="img/farmer.png" style="width: 50%;" />
                    <h3>Supplier 11</h3>
                </div>

                <div class="card">
                    <img src="img/farmer.png" style="width: 50%;" />
                    <h3>Supplier 12</h3>
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
        <div style="padding-top:100px; padding-right:20px;">
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


    <hr align="center" style="width: 80%;">

    <div id="vert-scroll-title">
        <h4>Shop by Product</h4>
        <div id="title-line"></div>
        <a href="byproducts.php">
            <h4>See all <i class="fal fa-arrow-right"></i></h4>
        </a>
    </div>


    <div style="display: flex;">


        <div style="padding-top:160px; padding-left: 20px;">
            <i class="fas fa-arrow-circle-left fa-3x" id="horizon-prev-5"></i>
        </div>



        <div class="container" id="vert-scroll-cont-5">
            <div id="result" style="display: flex;">
                <?php
                include 'database/db_connection.php';
                $stmt = $conn->prepare("SELECT * FROM products");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) : ?>

                <div id="product" class="product-image-wrapper">
                    <div class="single-product">
                        <div class="productinfo text-center">
                            <a href="product_details.php?id=<?php echo $row['id'] ?>"><img
                                    src="<?= $row['product_image'] ?>" alt="" class="card-img-top" height="250"></a>
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

                <?php endwhile; ?>

            </div><!-- End Row -->
        </div>

        <div class="container" id="vert-scroll-cont-5">
            <div id="result" style="display: flex;">
                <?php
                include 'database/db_connection.php';
                $stmt = $conn->prepare("SELECT * FROM products");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) : ?>

                <div id="product" class="product-image-wrapper">
                    <div class="single-product">
                        <div class="productinfo text-center">
                            <a href="product_details.php?id=<?php echo $row['id'] ?>"><img
                                    src="<?= $row['product_image'] ?>" alt="" class="card-img-top" height="250"></a>
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

                <?php endwhile; ?>

            </div><!-- End Row -->
        </div>

        <div style="padding-top:160px; padding-right: 20px;">
            <i class="fas fa-arrow-circle-right fa-3x" id="horizon-next-5"></i>
        </div>


    </div>

    <br><br><br>

    <script>
    $('#horizon-prev-5').click(function() {
        event.preventDefault();
        $('#vert-scroll-cont-5').animate({
            scrollLeft: "-=500px"
        }, "slow");
    });

    $('#horizon-next-5').click(function() {
        event.preventDefault();
        $('#vert-scroll-cont-5').animate({
            scrollLeft: "+=500px"
        }, "slow");
    });
    </script>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JS Script to show the number of items in user's cart -->
    <script src="assets/js/num_cart_items.js"></script>
    <script src="assets/js/product_filter.js"></script>

    <?php include 'views/layout/footer_v2.php'; ?>
</body>

</html>
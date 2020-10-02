<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mango Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" media="all" rel="stylesheet">
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

</head>
<!--/head-->

<body>
    <!-- <header id="header"> -->
    <?php /* include 'header-components/header-top.php'; ?>

    <?php include 'header-components/header-middle.php'; ?>

    <?php include 'header-components/header-footer.php'; */ ?>
    <!-- </header> -->

    <?php
    include('header-components/header-top_chat.php');
    ?>

    <nav style="justify-content:space-between;">
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
            <ul class="unstyled d-flex">
                <!-- <li><a href="#"><i class="fab fa-facebook"></i></a></li> -->
                <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                <!-- <li><a href="#"><i class="fab fa-linkedin"></i></a></li> -->
                <li><a href="#" class="link <?php if (!isset($_SESSION["loggedin"])) echo "d-none" ?>">Ship
                        to</a></li>
                <li><a href="#" class="link <?php if (!isset($_SESSION["loggedin"])) echo "d-none" ?>">Hire</a>
                </li>
                <li><a href="dashboard_merchant.php"
                        class="link <?php if (!isset($_SESSION["loggedin"])) echo "d-none"  ?>">Sell</a></li>
                <li><a href="#" class="link <?php if (!isset($_SESSION["loggedin"])) echo "d-none" ?>">Watchlist</a>
                </li>
                <li><a href="logout.php" class="link <?php if (!isset($_SESSION["loggedin"])) echo "d-none" ?>">Sign
                        Out</a></li>
                <li><a href="signin.php" class="link <?php if (isset($_SESSION["loggedin"])) echo "d-none" ?>">Sign
                        in</a></li>
                <li><a href="signup.php" class="link <?php if (isset($_SESSION["loggedin"])) echo "d-none" ?>">Sign
                        up</a></li>
                <li><a href="#"><i
                            class="far fa-user-circle <?php if (!isset($_SESSION["loggedin"])) echo "d-none" ?>"></i><?php if (isset($_SESSION["loggedin"])) {
                                                                                                                                echo $_SESSION["firstname"];
                                                                                                                            } else {
                                                                                                                                echo "Guest";
                                                                                                                            } ?></a>
                </li>
                <li><a href="#" class="<?php if (!isset($_SESSION["loggedin"])) echo "d-none" ?>"><i
                            class="far fa-bell"></i></a></li>
                <li class="cart-icon"><a href="cart.php"><i class="fas fa-shopping-cart "></i><span id="cart-item"
                            class="badge" style="color: #fff; background-color: #FE980F;"></span></a></li>

            </ul>
        </div>



    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="display: flex; background:#2c8457">
        <div class="logo" style="margin-right: auto;">
            <a class="navbar-brand" href="index.php"><img src="img/logo1.png" id="nav-logo" alt="" /></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="search__box">
            <!-- <input type="text" placeholder="Search"/> -->

            <input type="text" id="inputsearchterm" onkeyup="loadsearch(<?php echo $accountuser; ?>)"
                placeholder="Search Store"
                style=" border-radius:4px; text-align:left; font-size:14px; color:#000; height:30px; border:none; outline:none" />

        </div>

        <div class="" id="navbarSupportedContent">

            <ul class="navbar-nav collapse navbar-collapse">
                <!-- <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> -->
                <li class="nav-item">
                    <a class="nav-link active" href="byproducts.php">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="404.php">Market Price</a>
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
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="#">Promotion Products</a>
                    </div>
                </li>
                <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Sell</a>
                        </li> -->
                <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Place Command</a>
                        </li> -->
                <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Blog</a>
                        </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="404.php">Contact Us</a>
                </li>
                <!-- <li class="nav-item">
                          <a class="nav-link disabled" href="#">Disabled</a>
                        </li> -->
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form> -->
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


    <?php include 'header-components/header-footer.php'; ?>
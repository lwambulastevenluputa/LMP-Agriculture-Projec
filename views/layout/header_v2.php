<?php 
// Initialize the session
// session_start();
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     $_SESSION["loggedin"] = true;
//     // header("location: signin.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mango Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" media="all" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5016887358.js" crossorigin="anonymous"></script>
   
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

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php include 'header-components/header-top.php'; ?>
		
		<?php include 'header-components/header-middle.php'; ?>
	
		<?php include 'header-components/header-footer.php'; ?>
	</header><!--/header-->
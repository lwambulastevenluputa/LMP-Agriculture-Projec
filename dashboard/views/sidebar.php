<?php 
    include 'database/db_connection.php'; 
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard_merchant.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>                
                <a class="nav-link" href="add_product.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                    Add Product
                </a>
                <a class="nav-link" href="registered_users.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Registered User
                </a>
                <a class="nav-link d-none" href="login.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                    Login
                </a>
                <a class="nav-link d-none" href="register.php">
                    <div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
                    Register
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            MangoChat Admin
            <b><?//= $row['username']; ?></b>
        </div>
    </nav>
</div>
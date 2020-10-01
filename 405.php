<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Marmelad', sans-serif;
    padding-bottom: 50px;
}
</style>

<body>
    <?php
    session_start();
    include 'views/layout/header_v2.php';

    ?>

    <div align="center" style="height: fit-content; padding-top:40px;">
        <h4>Oops. Its like this page is not available at the moment.</h4>
        <a href="index.php">
            <p style="color: blue;">Back to Home</p>
        </a>
    </div>

    <br><br><br>

    <?php include 'views/layout/footer_v2.php'; ?>




</body>
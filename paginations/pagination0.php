<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
</head>
<body>
<?php 
    // connect to database
    require_once('database/connect.php');

    // define how many results you want per page
    $results_per_page = 10;

    // find out the number of results stored in database
    $sql = "SELECT * FROM alphabet";
    $result = mysqli_query($conn,$sql);
    $number_of_results = mysqli_num_rows($result);

    // while ($row = mysqli_fetch_array($result)) {
    //     echo $row['id'] . ' '. $row['alphabet'] . '<br>';
    // }

    //determine number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);

    // determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // determine the sql LIMIT starting number for the results on the displaying page
    $this_page_first_result = ($page-1)*$results_per_page;

    // retrieve selected results from database and display them on page
    $sql = "SELECT * FROM alphabet LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)) {
        echo $row['id'] . '' . $row['alphabet'] . '<br>';
    }

    // display the links to the page
    for ($page=1;$page<=$number_of_pages;$page++) { 
        echo '<a href="pagination0.php?page='. $page .'">' . $page . ' ' . '</a>';
    }
?>
</body>
</html>
<?php

// connect to database
require_once('database/connect.php');

// ============ create some important variables that we will use for the pagination.============
// Get the total number of records(rows) from our table "students". [will be used to calculate how many pages there will be]
$total_pages = $conn->query('SELECT COUNT(*) FROM students')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1. [The second variable is used to determine which page the user is on]
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page. [third variable determines how many results will be shown on each page]
$num_results_on_page = 5;

// get the records from the database for the current page
if ($stmt = $conn->prepare('SELECT * FROM students ORDER BY name LIMIT ?,?')) {
    // Calculate the page to get the results we need from our table.
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param('ii', $calc_page, $num_results_on_page);
    $stmt->execute();
    // Get the results...
    $result = $stmt->get_result();

    // display these results, the results will be displayed in a table, you can display the results how you want

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <style>
    html {
        font-family: Tahoma, Geneva, sans-serif;
        padding: 20px;
        background-color: #F8F9F9;
    }

    table {
        border-collapse: collapse;
        width: 500px;
    }

    td,
    th {
        padding: 10px;
    }

    th {
        background-color: #54585d;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #54585d;
    }

    td {
        color: #636363;
        border: 1px solid #dddfe1;
    }

    tr {
        background-color: #f9fafb;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .pagination {
        list-style-type: none;
        padding: 10px 0;
        display: inline-flex;
        justify-content: space-between;
        box-sizing: border-box;
    }

    .pagination li {
        box-sizing: border-box;
        padding-right: 10px;
    }

    .pagination li a {
        box-sizing: border-box;
        background-color: #e2e6e6;
        padding: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        color: #616872;
        border-radius: 4px;
    }

    .pagination li a:hover {
        background-color: #d4dada;
    }

    .pagination .next a,
    .pagination .prev a {
        text-transform: uppercase;
        font-size: 12px;
    }

    .pagination .currentpage a {
        background-color: #518acb;
        color: #fff;
    }

    .pagination .currentpage a:hover {
        background-color: #518acb;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Join Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['joined']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
    <ul class="pagination">
        <?php if ($page > 1) : ?>
        <li class="prev"><a href="pagination.php?page=<?php echo $page - 1 ?>">Prev</a></li>
        <?php endif; ?>
        <?php if ($page > 3) : ?>
        <li class="start"><a href="pagination.php?page=1">1</a></li>
        <li class="dots">...</li>
        <?php endif; ?>
        <?php if ($page - 2 > 0) : ?><li class="page"><a
                href="pagination.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
        <?php if ($page - 1 > 0) : ?><li class="page"><a
                href="pagination.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>
        <li class="currentpage"><a href="pagination.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
        <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a
                href="pagination.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
        <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a
                href="pagination.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>
        <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
        <li class="dots">...</li>
        <li class="end"><a
                href="pagination.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
        </li>
        <?php endif; ?>
        <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
        <li class="next"><a href="pagination.php?page=<?php echo $page + 1 ?>">Next</a></li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</body>

</html>
<?php
    $stmt->close();
}
?>
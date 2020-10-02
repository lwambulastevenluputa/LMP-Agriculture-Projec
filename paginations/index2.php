<?php

//database connection
require_once 'database/connect_pdo.php';

// Set session
session_start();
if (isset($_POST['records-limit'])) {
    $_SESSION['records-limit'] = $_POST['records-limit'];
}

// Dynamic limit [define how many results you want per page]
$results_per_page = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10;
//$results_per_page = 10;

// Get total records [find out the number of results(rows) stored in database]
$query = $connection->query("SELECT count(id) AS id FROM authors")->fetchAll();
$number_of_records = $query[0]['id'];

// Calculate total pages [determine number of total pages available]
$number_of_pages = ceil($number_of_records / $results_per_page);

// Current pagination page number [determine which page number visitor is currenct on]
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
// if (!isset($_GET['page'])) {
//     $page = 1;
// } else {
//     $page = $_GET['page'];
// }

// Prev + Next 
$prev = $page - 1;
$next = $page + 1;

// Offset [determine the sql LIMIT starting number for the results on the displaying page]
$paginationStart = ($page - 1) * $results_per_page;

// retrieve selected results from database and display them on page [Limit query]
// $authors = $connection->query("SELECT * FROM authors LIMIT $paginationStart, $results_per_page")->fetchAll();

if ($stmt = $connection->prepare('SELECT * FROM authors LIMIT ?, ?')) {
    $stmt->bindParam("ii", $paginationStart, $results_per_page);
    $stmt->execute();
    // Get the results..
    $result = $stmt->get_result();
    $authors = $result->fetch_assoc();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>PHP Pagination Example</title>
    <title>Pagination in PHP</title>
    <style>
    .container {
        max-width: 1000px
    }

    .custom-select {
        max-width: 150px
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-5">Simple PHP Pagination Demo</h2>


        <!-- Select dropdown -->
        <div class="d-flex flex-row-reverse bd-highlight mb-3">
            <form action="index.php" method="post">
                <select name="records-limit" id="records-limit" class="custom-select">
                    <option disabled selected>Records Limit</option>
                    <?php foreach ([5, 7, 10, 12] as $limit) : ?>
                    <option
                        <?php if (isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                        value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <!-- Datatable -->
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author) : ?>
                <tr>
                    <th scope="row"><?php echo $author['id']; ?></th>
                    <td><?php echo $author['first_name']; ?></td>
                    <td><?php echo $author['last_name']; ?></td>
                    <td><?php echo $author['email']; ?></td>
                    <td><?php echo $author['birthdate']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($page <= 1) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . $prev;
                                                } ?>">Previous</a>
                </li>

                <?php for ($i = 1; $i <= $number_of_pages; $i++) : ?>
                <li class="page-item <?php if ($page == $i) {
                                                echo 'active';
                                            } ?>">
                    <a class="page-link" href="index2.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if ($page >= $number_of_pages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($page >= $number_of_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . $next;
                                                } ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#records-limit').change(function() {
            $('form').submit();
        })
    });
    </script>

</body>

</html>
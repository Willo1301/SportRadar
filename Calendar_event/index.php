<?php

require_once "db_connect.php";


$sort = $_GET['sort'] ?? '';
$order = $_GET['order'] ?? 'asc';

$nextOrder = ($order === 'asc') ? 'desc' : 'asc';

$sortQuery = "";
if ($sort === "sport") {
    $sortQuery = "ORDER BY sport " . strtoupper($order);
} elseif ($sort === "date") {
    $sortQuery = "ORDER BY date " . strtoupper($order);
}

$sql = "SELECT * FROM `event` $sortQuery";
$result = mysqli_query($conn, $sql);




$layout = "";

if (mysqli_num_rows($result) > 0) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($rows as $row) {

        $formattedDate = date("d-m-Y", strtotime($row["date"]));
        $formattedTime = date("H:i", strtotime($row["time"]));

        $layout .= "
        <div>
            <div class= 'card text-center my-3'>
                <img src='{$row['img']}' class='card-img-top' alt='{$row['event_name']}'>
                <div class='card-body'>
                    <h5 class='card-title'>{$row["event_name"]}</h5>
                    <p class='card-text'>Date: " . $formattedDate . "</p>
                    <p class='card-text'>Time: " . $formattedTime . "</p>
                    <a href= 'details.php?id={$row["event_id"]}' class='btn btn-primary'> Event Details </a>
                </div>
            </div>
        </div>
        ";
    }
} else {
    $layout .= "No results found!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Event Calender</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Bootstrap CDN -->
    <!-- Css -->
    <link rel="stylesheet" href="style.css">
    <!-- Css -->
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- bootstrap icons -->
</head>

<body>
    <div class="navbar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">My Event Calendar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"">Home</a>
                        </li>
                        <li class=" nav-item">
                                <a class="nav-link active" aria-current="page" href="create.php"">Create Event</a>
                        </li>
                        <li class=" nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort By
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="?sort=sport&order=<?= $nextOrder ?>">
                                                Sport
                                                <?php if ($sort === 'sport'): ?>
                                                    <?= $order === 'asc' ? '↑' : '↓' ?>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="?sort=date&order=<?= $nextOrder ?>">
                                                Date
                                                <?php if ($sort === 'date'): ?>
                                                    <?= $order === 'asc' ? '↑' : '↓' ?>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    </ul>
                        </li>
                    </ul>
                    <form class=" d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>



    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?= $layout ?>
        </div>
    </div>

    <footer class="bg-dark py-5 mt-5">
        <div class="container text-light text-center">
            <p class="display-5 mb-3">Sport Calendar</p>
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#"><i class="bi bi-facebook fs-2 me-3"></i></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#"><i class="bi bi-linkedin fs-2 me-3"></i></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#"><i class="bi bi-instagram fs-2 me-3"></i></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#"><i class="bi bi-pinterest fs-2 me-3"></i></a>
            <br>
            <br>
            <small class="text-white-50">&copy; 2025 Copyright by Sport Calendar. All rights reserved</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
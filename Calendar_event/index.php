<?php

require_once "db_connect.php";

$sql = "SELECT * FROM `event`";

$result = mysqli_query($conn, $sql);

$layout = "";

if (mysqli_num_rows($result) > 0) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($rows as $row) {
        $layout .= "
        <div>
            <div class= 'card text-center my-3'>
                <img src='{$row['img']}' class='card-img-top' alt='{$row['event_name']}'>
                <div class='card-body'>
                    <h5 class='card-title'>{$row["event_name"]}</h5>
                    <p class='card-text'>{$row["time"]}<p/>
                    <p class='card-text'>{$row["sport"]}<p/>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <a href="create.php">Create Event</a>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?= $layout ?>
        </div>
    </div>
</body>

</html>
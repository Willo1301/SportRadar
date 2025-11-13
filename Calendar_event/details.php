<?php

require_once "db_connect.php";

$url_id = $_GET["id"];

$sql = "SELECT * FROM event WHERE event_id = {$url_id}";
$result = mysqli_query($conn, $sql);

$layout = '';
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $layout = "
    <div class='card' style='width: 18rem;'>
        <img src='{$row['img']}' class='card-img-top' alt='{$row['event_name']}'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['event_name']}</h5>
            <p class='card-text'>{$row['sport']}</p>
    </div>
        <ul class='list-group list-group-flush'>
            <li class='list-group-item'>{$row['day']}</li>
            <li class='list-group-item'>{$row['date']}</li>
            <li class='list-group-item'>{$row['time']}</li>
        </ul>
  <div class='card-body'>
    <a href='update.php?id={$row['event_id']}' class='btn btn-success'>Update</a>
    <a href='delete.php?id={$row["event_id"]}' class='btn btn-danger'>Delete</a>
    <a href='index.php' class='btn btn-secondary'>Back</a>
  </div>
</div>
    ";
} else {
    $layout = "<h3>No event found with id of {$url_id}!</h3>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Event Details</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 mx-auto">
                <?= $layout ?>
            </div>
        </div>
    </div>
</body>

</html>
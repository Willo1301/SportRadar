<?php

require_once 'db_connect.php';

$url_id = $_GET['id'];
$sql = "SELECT * FROM `event` WHERE event_id = {$url_id}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $event_name = trim($_POST['event_name']);
    $event_name = strip_tags($event_name);
    $event_name = htmlspecialchars($event_name);

    $date = $_POST['date'];
    $time = $_POST['time'];
    $day = trim($_POST['day']);
    $day = strip_tags($day);
    $day = htmlspecialchars($day);

    $sport = trim($_POST['sport']);
    $sport = strip_tags($sport);
    $sport = htmlspecialchars($sport);

    $img = trim($_POST['img']);
    $img = strip_tags($img);
    $img = htmlspecialchars($img);


    if (empty($img)) {
        $updateSql = "UPDATE `event` SET `event_name`='$event_name',`date`='$date',`time`='$time',`day`='$day',`sport`='$sport' WHERE event_id = $url_id";
    } else {
        $updateSql = "UPDATE `event` SET `event_name`='$event_name',`date`='$date',`time`='$time',`day`='$day',`sport`='$sport',`img`='$img' WHERE event_id = $url_id";
    }
    $result = mysqli_query($conn, $updateSql);

    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
                    Your event has been updated successfully! 
                </div>";
    } else {
        echo "<div class='alert alert-success' role='danger'>
                    Something went wrong ! 
                </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Update</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col col-md-6 mx-auto">
                <h3 class="text-center my-3">Update Event</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="event_name" class="form-label">Event name</label>
                        <input type="text" id="event_name" name="event_name" class="form-control"
                            value="<?= $row['event_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" name="date" class="form-control"
                            value="<?= $row['date'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" id="time" name="time" class="form-control"
                            value="<?= $row['time'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="day" class="form-label">Day</label>
                        <input type="text" id="day" name="day" class="form-control"
                            value="<?= $row['day'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sport" class="form-label">Sport</label>
                        <input type="text" id="sport" name="sport" class="form-control"
                            value="<?= $row['sport'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="text" id="img" name="img" class="form-control"
                            value="<?= $row['img'] ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <a href='index.php' class='btn btn-secondary'>Back</a>
            </div>

        </div>

    </div>

</body>

</html>
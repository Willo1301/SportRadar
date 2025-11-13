<?php

require_once 'db_connect.php';

if (isset($_POST['submit'])) {

    $event_name = $_POST["event_name"];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $day = $_POST['day'];
    $sport = $_POST['sport'];
    $img = $_POST['img'];

    $sql = "INSERT INTO `event`(`event_name`, `date`, `time`, `day`, `sport`, `img`) VALUES ('$event_name','$date','$time','$day','$sport','$img')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
                    New event has been created ! 
                </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
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
    <title>Create new event</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 mx-auto">
                <h3 class="text-center my-3">Create Event</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="event_name" class="form-label">Event name</label>
                        <input type="text" id="event_name" name="event_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" id="time" name="time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="day" class="form-label">Day</label>
                        <input type="text" id="day" name="day" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="sport" class="form-label">Sport</label>
                        <input type="text" id="sport" name="sport" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="text" id="img" name="img" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <a href='index.php' class='btn btn-secondary'>Back</a>
            </div>

        </div>

    </div>
</body>

</html>
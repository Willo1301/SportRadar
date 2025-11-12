<?php

require_once "db_connect.php";

if (isset($_POST["submit"])) {

    $event_name = $_POST["event_name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $day = $_POST["day"];
    $sport = $_POST["sport"];

    $sql = "INSERT INTO `event`(`event_name`, `date`, `time`, `day`, `sport`, `img`) VALUES ('$event_name','$date','$time','$day','$sport',`img`)";



    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" name="event_name" placeholder="Event Name">
        <input type="date" name="date" placeholder="Event Date">
        <input type="time" name="time" placeholder="Event Time">
        <input type="text" name="day" placeholder="Event Day">
        <input type="text" name="sport" placeholder="Sport">
        <input type="text" name="img" placeholder="img">
        <input type="submit" name="Submit">
    </form>
</body>

</html>
<?php
require_once 'db_connect.php';
$url_id = $_GET['id'];

$sql = "SELECT * FROM `event` WHERE event_id = {$url_id}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$deleteSql = "DELETE FROM `event` WHERE event_id = {$url_id}";
mysqli_query($conn, $deleteSql);
header("Location: index.php");

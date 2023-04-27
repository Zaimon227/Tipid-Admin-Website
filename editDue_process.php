<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$name = $_POST['Name'];
$cost = $_POST['Cost'];
$date = $_POST['Date'];

$sql = "UPDATE dues SET user_id = $user_id, name = '$name', cost = $cost, date = '$date' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Due";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Due ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: dues.php");
} else {
    header("Location: dues.php?error=Process Failed");
}
?>
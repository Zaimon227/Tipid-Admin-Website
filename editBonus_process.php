<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$amount = $_POST['Amount'];
$date = $_POST['Date'];

$sql = "UPDATE bonus SET user_id = $user_id, amount = $amount, date = '$date' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Bonus";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Bonus ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: bonus.php");
} else {
    header("Location: bonus.php?error=Process Failed");
}
?>
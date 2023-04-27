<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$username = $_POST['Username'];
$monthly_earnings = $_POST['MonthlyEarnings'];

$sql = "UPDATE users SET username = '$username', monthly_earnings = $monthly_earnings WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited User";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited User ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: users.php");
} else {
    header("Location: users.php?error=Process Failed");
}
?>
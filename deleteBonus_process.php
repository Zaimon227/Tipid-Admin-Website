<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$sql = "UPDATE bonus SET is_archived = 1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Archived Bonus";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'archived Bonus ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: bonus.php");
} else {
    header("Location: bonus.php?error=Process Failed");
}
?>
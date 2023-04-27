<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$sql = "UPDATE dues SET is_archived = 1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Archived Due";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'archived User ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: dues.php");
} else {
    header("Location: dues.php?error=Process Failed");
}
?>
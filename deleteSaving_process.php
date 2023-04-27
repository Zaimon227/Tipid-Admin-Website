<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$sql = "UPDATE savings SET is_archived = 1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Archived Savings";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'archived Savings ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: savings.php");
} else {
    header("Location: savings.php?error=Process Failed");
}
?>
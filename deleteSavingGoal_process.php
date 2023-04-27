<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$sql = "UPDATE saving_goals SET is_archived = 1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Archived Savings Goal";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'archived Savings Goal ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: savingGoals.php");
} else {
    header("Location: savingGoals.php?error=Process Failed");
}
?>
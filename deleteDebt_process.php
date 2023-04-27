<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$sql = "UPDATE debts SET is_archived = 1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Archived Debt";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'archived Debt ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: debts.php");
} else {
    header("Location: debts.php?error=Process Failed");
}
?>
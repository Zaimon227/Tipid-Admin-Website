<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$sql = "UPDATE debt_payments SET is_archived = 1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Archived Debt Payment";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'archived Debt Payment ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: debtPayments.php");
} else {
    header("Location: debtPayments.php?error=Process Failed");
}
?>
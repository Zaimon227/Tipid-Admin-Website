<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$debt_id = $_POST['DebtID'];
$amount = $_POST['Amount'];
$date = $_POST['Date'];

$sql = "UPDATE debt_payments SET user_id = $user_id, debt_id = $debt_id, amount = $amount, date = '$date' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Debt Payment";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Debt Payment ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: debtPayments.php");
} else {
    header("Location: debtPayments.php?error=Process Failed");
}
?>
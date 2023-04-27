<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$name = $_POST['Name'];
$paid_amount = $_POST['PaidAmount'];
$total_debt = $_POST['TotalDebt'];
$date = $_POST['Date'];

$sql = "UPDATE debts SET user_id = $user_id, name = '$name', paid_amount = $paid_amount, total_debt = $total_debt, date = '$date' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Debt";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Debt ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: debts.php");
} else {
    header("Location: debts.php?error=Process Failed");
}
?>
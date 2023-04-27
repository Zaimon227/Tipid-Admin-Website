<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$name = $_POST['Name'];
$category = $_POST['Category'];
$cost = $_POST['Cost'];
$date = $_POST['Date'];

$sql = "UPDATE expenses SET user_id = $user_id, name = '$name', category = '$category', cost = $cost, date = '$date' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Expense";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Expense ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: expenses.php");
} else {
    header("Location: expenses.php?error=Process Failed");
}
?>
<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$amount = $_POST['Amount'];
$date = $_POST['Date'];

$sql = "UPDATE savings SET user_id = $user_id, amount = $amount, date = '$date' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Savings";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Savings ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: savings.php");
} else {
    header("Location: savings.php?error=Process Failed");
}
?>
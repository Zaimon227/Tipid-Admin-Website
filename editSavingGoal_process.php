<?php
session_start();
require "DBConfig.php";

$id = $_GET['id'];

$user_id = $_POST['UserID'];
$name = $_POST['Name'];
$goal_amount = $_POST['GoalAmount'];

$sql = "UPDATE saving_goals SET user_id = $user_id, name = '$name', goal_amount = $goal_amount WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['status'] = "Successfully Edited Savings Goal";
    $admin = $_SESSION['username'];
    $sql2 = "INSERT INTO logs (admin_name, action, date) VALUES ('$admin', 'edited Savings Goal ID $id', CURRENT_DATE())";
    $result2 = mysqli_query($conn, $sql2);
    header("Location: savingGoals.php");
} else {
    header("Location: savingGoals.php?error=Process Failed");
}
?>
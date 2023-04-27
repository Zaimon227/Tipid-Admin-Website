<?php
require "DBConfig.php";

$id = $_GET['id'];

$password = $_POST['Password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE users SET password = '$hashedPassword' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: users.php?error=Password Changed");
} else {
    header("Location: users.php?error=Process Failed");
}
?>
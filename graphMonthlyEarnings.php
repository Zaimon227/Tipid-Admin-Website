<?php

require "DBConfig.php";
header ('Content-Type: application/json');

$sql = sprintf("SELECT COUNT(id) AS count FROM users WHERE monthly_earnings <= 15000");
$result1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result1);

$sql = sprintf("SELECT COUNT(id) AS count FROM users WHERE monthly_earnings BETWEEN 15001 AND 35000");
$result2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result2);

$sql = sprintf("SELECT COUNT(id) AS count FROM users WHERE monthly_earnings BETWEEN 35001 AND 55000");
$result3 = mysqli_query($conn, $sql);
$row3 = mysqli_fetch_assoc($result3);

$sql = sprintf("SELECT COUNT(id) AS count FROM users WHERE monthly_earnings BETWEEN 55001 AND 75000");
$result4 = mysqli_query($conn, $sql);
$row4 = mysqli_fetch_assoc($result4);

$sql = sprintf("SELECT COUNT(id) AS count FROM users WHERE monthly_earnings BETWEEN 75001 AND 95000");
$result5 = mysqli_query($conn, $sql);
$row5 = mysqli_fetch_assoc($result5);

$sql = sprintf("SELECT COUNT(id) AS count FROM users WHERE monthly_earnings > 95000");
$result6 = mysqli_query($conn, $sql);
$row6 = mysqli_fetch_assoc($result6);

$data = array();

$data[0] = $row1;
$data[1] = $row2;
$data[2] = $row3;
$data[3] = $row4;
$data[4] = $row5;
$data[5] = $row6;

print json_encode($data);
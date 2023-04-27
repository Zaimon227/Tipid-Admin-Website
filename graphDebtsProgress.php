<?php

require "DBConfig.php";
header ('Content-Type: application/json');

$sql = sprintf("SELECT SUM(paid_amount) AS info FROM debts");
$result1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result1);

$sql = sprintf("SELECT SUM(total_debt) AS info FROM debts");
$result2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result2);

$data = array();

$data[0] = $row1;
$data[1] = $row2;

print json_encode($data);
<?php

require "DBConfig.php";
header ('Content-Type: application/json');

$sql = sprintf("SELECT category, COUNT(id) AS count FROM expenses GROUP BY category");
$result = mysqli_query($conn, $sql);

$data = array();

foreach ($result as $row) {
    $data[] = $row;
}

print json_encode($data);
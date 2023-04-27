<?php

require "DBConfig.php";
header ('Content-Type: application/json');

$sql = sprintf("SELECT name, COUNT(id) AS count FROM dues GROUP BY name ORDER BY count DESC LIMIT 5");
$result = mysqli_query($conn, $sql);

$data = array();

foreach ($result as $row) {
    $data[] = $row;
}

print json_encode($data);
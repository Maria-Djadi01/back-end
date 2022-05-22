<?php
header('Content-Type: application/json');
include '../conn.php';


if(isset($_POST['server_name'])) $server_name = $_POST['server_name'];
if(isset($_POST['ip'])) $ip = $_POST['ip'];

$stmt = $conn->prepare('INSERT INTO `servers` (`server_name`, `ip`) VALUES (?, ?)');
$stmt -> execute([$server_name, $ip]);


$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
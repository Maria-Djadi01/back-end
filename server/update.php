<?php
header('Content-Type: application/json');
include '../conn.php';

if(isset($_POST['id'])) $id = $_POST['id'];
if(isset($_POST['server_name'])) $server_name = $_POST['server_name'];
if(isset($_POST['ip'])) $ip = $_POST['ip'];

$stmt = $conn->prepare('UPDATE `servers` SET `server_name` = ?, `ip` = ? WHERE id = ?');
$stmt -> execute([$server_name, $ip, $id]);


$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
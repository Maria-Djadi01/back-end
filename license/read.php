<?php
include ('../conn.php');

if(isset($_POST['license_name'])) $license_name = $_POST['license_name'];

$stmt = $conn->prepare("SELECT * FROM `license` WHERE `license_name` = ?");

$stmt->execute([$license_name]);

$data = $stmt ->fetch(PDO::FETCH_ASSOC);

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success', 'data' => $data));
}else {
    echo json_encode(array('status' => 'failure'));
}
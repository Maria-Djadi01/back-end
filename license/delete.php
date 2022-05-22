<?php
include ('../conn.php');
if(isset($_POST['license_name'])) $license_name = $_POST['license_name'];

$stmt = $conn->prepare("DELETE FROM `license` WHERE `license_name` = ?");

$stmt->execute(array($license_name));

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
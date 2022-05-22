<?php
header('Content-Type: application/json');
include '../conn.php';

if(isset($_POST['license_name'])) $license_name = $_POST['license_name'];
if(isset($_POST['license_amount'])) $license_amount = $_POST['license_amount'];
if(isset($_POST['purchase_date'])) $purchase_date = $_POST['purchase_date'];
if(isset($_POST['expiration_date'])) $expiration_date = $_POST['expiration_date'];


$stmt = $conn->prepare("UPDATE `license` SET 
`license_name`=?, `license_amount`=?, `purchase_date` = ?, `expiration_date` = ? WHERE `license_name` = ?");
$stmt -> execute([$license_name, $license_amount, $purchase_date, $expiration_date, $license_name]);


$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
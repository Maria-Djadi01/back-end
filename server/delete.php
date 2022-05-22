<?php
include ('../conn.php');
if(isset($_POST['id'])) $id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM `servers` WHERE `id` = ?");

$stmt->execute(array($id));

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
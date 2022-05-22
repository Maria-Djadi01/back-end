<?php
include ('../conn.php');

if(isset($_POST['id'])) $id = $_POST['id'];

$stmt = $conn->prepare("SELECT * FROM `servers` WHERE `id` = ?");

$stmt->execute([$id]);

$data = $stmt ->fetch(PDO::FETCH_ASSOC);

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success', 'data' => $data));
}else {
    echo json_encode(array('status' => 'failure'));
}
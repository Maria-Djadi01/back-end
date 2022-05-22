<?php
include ('../conn.php');

if(isset($_POST['post_id'])) $post_id = $_POST['post_id'];

$stmt = $conn->prepare("SELECT * FROM `users` WHERE `post_id` = ?");

$stmt->execute([$post_id]);

$data = $stmt ->fetch(PDO::FETCH_ASSOC);

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success', 'data' => $data));
}else {
    echo json_encode(array('status' => 'failure'));
}
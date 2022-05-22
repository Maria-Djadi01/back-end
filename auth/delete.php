<?php
include ('../conn.php');
if(isset($_POST['post_id'])) $post_id = $_POST['post_id'];

$stmt = $conn->prepare("DELETE FROM `users` WHERE `post_id` = ?");

$stmt->execute(array($post_id));

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
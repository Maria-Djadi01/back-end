<?php
include ('../conn.php');

if(isset($_POST['user_name'])) $user_name = $_POST['user_name'];
if(isset($_POST['post_id'])) $post_id = $_POST['post_id'];
if(isset($_POST['password'])) $password = $_POST['password'];
if(isset($_POST['role'])) $role = $_POST['role'];

$stmt = $conn->prepare("INSERT INTO `users` (`user_name`,`post_id` , `password`, `role`)
                        VALUES (?, ?, ?, ?);");

$stmt->execute(array($user_name, $post_id, $password, $role));

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
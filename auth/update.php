<?php
include ('../conn.php');

if(isset($_POST['user_name'])) $user_name = $_POST['user_name'];
if(isset($_POST['post_id'])) $post_id = $_POST['post_id'];
if(isset($_POST['password'])) $password = $_POST['password'];
if(isset($_POST['role'])) $role = $_POST['role'];

$stmt = $conn->prepare("UPDATE `users` SET 
                        `user_name` = ?, `post_id`=?, `password`=?, `role` = ? WHERE `post_id` = ?");

$stmt->execute(array($user_name, $post_id, $password, $role, $post_id));

$count = $stmt ->rowCount();

if ($count > 0) {
    echo json_encode(array('status' => 'success'));
}else {
    echo json_encode(array('status' => 'failure'));
}
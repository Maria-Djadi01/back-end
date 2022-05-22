<?php
include ('../conn.php');

if(isset($_POST['user_name'])) $user_name = $_POST['user_name'];
if(isset($_POST['password'])) $password = $_POST['password'];

$stmt = $conn->prepare("SELECT* FROM users WHERE
                        `user_name` = ? AND `password` = ?");

$stmt->execute(array($user_name, $password));

$count = $stmt ->rowCount();

$data = $stmt ->fetch(PDO::FETCH_ASSOC);

if ($count > 0) {
    echo json_encode(array('status' => 'success', 'data' => $data));
}else {
    echo json_encode(array('status' => 'failure'));
}
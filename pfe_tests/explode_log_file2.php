<?php

include 'conn.php';

$file = file("dbg.log",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$general_data = array();

foreach($file as $log){
    $general_data[] = explode (' ', $log);
}



$detail_data = array();

foreach ($general_data as $key => $value) {
    if(isset($value[3])){
        if($value[3] == 'IN:' || $value[3] == 'OUT:') {
            $stmt = $db->prepare("INSERT INTO `log_read`(`time`, `vendor`, `status`, `license`, `user_id`) VALUES (?, ?, ?, ?, ?)");
            $result = $stmt->execute([str_replace(' ', '', $value[1]), str_replace(['(', ')'], '', $value[2]), str_replace(':', '', $value[3]), str_replace('"','', $value[4]), $value[5]]);
        }
    }
}
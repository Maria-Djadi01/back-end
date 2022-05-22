<?php

include '../conn.php';

$file = file("dbg1.log",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// ini_set('max_execution_time', 0);

// initialize the last line of the file
$last_line = 0;

// while(true) {
    // current line
    $current = count($file);

    if($current < $last_line) {
        $last_line = $current;
    }


    if($current > $last_line) {
        $new_file = array_slice($file, $last_line);
        $general_data = array();

        foreach($file as $log){
            $general_data[] = explode (' ', $log);
        }



        $detail_data = array();

        foreach ($general_data as $key => $value) {
            if(isset($value[3])){
                if($value[3] == 'IN:' || $value[3] == 'OUT:') {
                    $stmt = $conn->prepare("INSERT INTO `log_read1`(`date`, `time`, `vendor`, `status`, `license`, `user_id`) VALUES (NOW(), ?, ?, ?, ?, ?)");
                    $result = $stmt->execute([str_replace(' ', '', $value[1]), str_replace(['(', ')'], '', $value[2]), str_replace(':', '', $value[3]), str_replace('"','', $value[4]), $value[5]]);
                }
                if($value[3] == 'UNSUPPORTED:') {
                    $stmt = $conn->prepare("INSERT INTO `log_read1`(`date`, `time`, `vendor`, `status`, `license`, `user_id`) VALUES (NOW(), ?, ?, ?, ?, ?)");
                    $result = $stmt->execute([str_replace(' ', '', $value[1]), str_replace(['(', ')'], '', $value[2]), str_replace(':', '', $value[3]), str_replace('"','', $value[4]), $value[9]]);
                }
            }
        }
    }
    $last_line = $current;
// }



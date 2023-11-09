<?php

header("Content-Type:text/event-stream");
header('Cache-Control: no-control'); // recommended to prevent caching of event data.

include '../connection.php';

$output = '';
$online = '';
$list = [];//ADDEDD

$query1 = "SELECT * FROM chat";
$res1 = mysqli_query($con, $query1);

while($row = mysqli_fetch_assoc($res1)){
    if($row['status'] == 'false'){
        $output .= "<li class='ip-list'  id='ip-list" . $row['id'] . "' onclick='showChat(" . $row['id'] . ")'>" . $row['ip'] . "<span class='offline'></span></li>";    
    }else{        
        if($row['notification'] > 0){
            $online .= "<li class='ip-list'  id='ip-list" . $row['id'] . "' onclick='showChat(" . $row['id'] . ")'>" . $row['ip'] . "<span class='online'></span><span class='notify'>" . $row['notification'] . "</span></li>";

            array_push($list, $row['ip']);//ADDEDD

        }else{
            $array = json_decode($row['message'], true);
            $count = count($array);
            if($count == 0){
                $online .= "<li class='ip-list'  id='ip-list" . $row['id'] . "' onclick='showChat(" . $row['id'] . ")'>" . $row['ip'] . " (new) <span class='online'></span></li>";
            }else{
                $online .= "<li class='ip-list'  id='ip-list" . $row['id'] . "' onclick='showChat(" . $row['id'] . ")'>" . $row['ip'] . "<span class='online'></span></li>";
            }
        }
        }
    }


echo "data: " . json_encode(['offline'=>$output,'online'=>$online,'array'=>$list]) . "\n\n";//ADDEDD

flush();

<?php

header("Content-Type:text/event-stream");
header('Cache-Control: no-control'); // recommended to prevent caching of event data.

include '../connection.php';

$ip = $_GET['ip'];

 
$query1 = "SELECT * FROM chat WHERE `ip`= '$ip' ";
$res1 = mysqli_query($con, $query1);

if($res1){
    $query5 = "UPDATE `chat` SET `notification` = 0 WHERE `ip`= '$ip'";
    $res5 = mysqli_query($con, $query5);
}

$row = mysqli_fetch_assoc($res1);
$mess = $row['message'];
$type = $row['admin_typing'];

echo "data: " . json_encode(['mes' => $mess,'typing' => $type]). "\n\n";

flush();

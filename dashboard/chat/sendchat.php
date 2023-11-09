<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include './connection.php';
$response = file_get_contents("http://ip-api.com/json/{$_POST['ip']}");
$data = json_decode($response);
$timeZone = $data->timezone;
date_default_timezone_set($timeZone);
// Time Zone Defined

// Time Converting Function
function calculateTimeDifference($givenTime) {
    list($days, $hours, $minutes, $seconds) = array_map('intval', explode(' : ', $givenTime));
    $givenTimeInSeconds = $days * 24 * 60 * 60 + $hours * 60 * 60 + $minutes * 60 + $seconds;
    $currentDate = new DateTime();
    $currentDays = $currentDate->format('j');
    $currentHours = $currentDate->format('G');
    $currentMinutes = $currentDate->format('i');
    $currentSeconds = $currentDate->format('s');
    $currentTimeInSeconds = $currentDays * 24 * 60 * 60 + $currentHours * 60 * 60 + $currentMinutes * 60 + $currentSeconds;
    $timeDifferenceInSeconds = $currentTimeInSeconds - $givenTimeInSeconds;
    if ($timeDifferenceInSeconds <= 0) {
        return '0sec'; // Return 0 if the given time is in the future or equal to the current time
    }

    if ($timeDifferenceInSeconds < 60) {
        // If the time difference is less than 1 minute, show seconds
        return $timeDifferenceInSeconds . 'sec';
    }
    if ($timeDifferenceInSeconds < 60 * 60) {
        $minutesDifference = floor($timeDifferenceInSeconds / 60);
        return $minutesDifference . 'min';
    }
    if ($timeDifferenceInSeconds < 24 * 60 * 60) {
        $hoursDifference = floor($timeDifferenceInSeconds / (60 * 60));
        return $hoursDifference . 'hrs';
    }
    $daysDifference = floor($timeDifferenceInSeconds / (24 * 60 * 60));
    return $daysDifference . 'days';
}

// Time Converting Function

$date = new DateTime();
$ip = $_POST['ip'];
$token = $_POST['authtoken'];
$message = $_POST['message'];
$chat = '';

// Custom Chat
$Admin_auth = "SELECT * FROM user INNER JOIN customise ON user.id = customise.user_id WHERE user.api_key = '$token'";
$admin_result = mysqli_query($con, $Admin_auth);
if($admin_result){
$admin_row = mysqli_fetch_assoc($admin_result);
}
// Custom Chat


$query_to_check_if_chat_exist = "SELECT * FROM chat WHERE ip = '$ip' && admin_id = '$token' ";
$query_to_check_if_chat_exist_result = mysqli_query($con, $query_to_check_if_chat_exist);

if($query_to_check_if_chat_exist_row  = mysqli_fetch_assoc($query_to_check_if_chat_exist_result)){
    if($query_to_check_if_chat_exist_row['block_ip'] == 'true'){
        echo json_encode(array('status'=>402));
    }else{
        $jsonData = json_decode($query_to_check_if_chat_exist_row['message'], true);
        $i = count($jsonData);
        $jsonData[$i] = array();
        $jsonData[$i][1] = $message;
        $jsonData[$i][2] = $date->format('j') . 'days : ' . $date->format('G') . 'hrs : ' . $date->format('i') . 'min : ' . $date->format('s') . 'sec';
        $jsonData[$i][3] = 'user';
        $jsonData[$i][4] = 'delivered';

        $message =json_encode($jsonData);

        $update_chat_message = "UPDATE `chat` SET `message` = '$message' , `admin_typing` = 'false', `notification` = 1 WHERE `ip` = '$ip' && admin_id = '$token'";
        $update_chat_message_result = mysqli_query($con, $update_chat_message);
        if ($update_chat_message_result) {
            $query_to_check_if_chat_exist2 = "SELECT * FROM chat WHERE ip = '$ip' && admin_id = '$token' ";
            $query_to_check_if_chat_exist_result2 = mysqli_query($con, $query_to_check_if_chat_exist2);
            if($query_to_check_if_chat_exist_row2  = mysqli_fetch_assoc($query_to_check_if_chat_exist_result2)){
                
                $jsonData2 = json_decode($query_to_check_if_chat_exist_row2['message'], true);

                $count_msg = count($jsonData2);
                for($j=0;$j<$count_msg;$j++){
                    // $chat .= $jsonData[$j][3].',';
                    if($jsonData[$j][3] == 'user'){
                        $time = calculateTimeDifference($jsonData[$j][2]);
                        $chat .= '<div style="display: grid;margin:1.5% auto;"><div style="text-align:left;padding:1%;"><p style="text-align:left;margin:0;border-radius:5px;"><small style="font-size: small;"><b>you</b> ' . $time . '</small><br><span style="color:white;padding:.3% 3% .3% 1.5%;border-radius:5px;display: inline-block;background-color:'.$admin_row['user-color'].';overflow-wrap: break-word;" class="user-mesg-text">' . $jsonData[$j][1] . '</span><br><small >' . $jsonData[$j][4] . '</small></p></div></div>';
                    }else{                    
                        $time = calculateTimeDifference($jsonData[$j][2]);
                        $chat .= '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: right; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' .$jsonData[$j][3]. '</b> ' . $time . '</small><br><span class="admin-mesg-text" style=" display: inline-block;  color: white; padding: .3% 1.5% .3% 3%; border-radius: 5px;overflow-wrap: break-word;background-color:'.$admin_row['admin-color'].';">' . $jsonData[$j][1] . '</span><br><small>' . $jsonData[$j][4] . '</small></p></div></div>';
                    }
                }

                echo json_encode(array('status'=>true,'msg'=>"Message Sent Successfully",'data'=>$chat));
            }
        }
    }
}




// $d = new DateTime();
// $i = 0; // Assuming you have the index 'i' defined somewhere in your PHP code
// $jsonData = array();

// $jsonData[$i] = array();
// $jsonData[$i][1] = $pk_solutions_chatus;
// $jsonData[$i][2] = $d->format('j') . 'days : ' . $d->format('G') . 'hrs : ' . $d->format('i') . 'min : ' . $d->format('s') . 'sec';
// $jsonData[$i][3] = 'user';
// $jsonData[$i][4] = 'delivered';

// // Convert the PHP array to JSON format if needed
// $jsonString = json_encode($jsonData);

// // Output the JSON string
// echo $jsonString;



?>
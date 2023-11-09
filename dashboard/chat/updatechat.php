<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

header("Content-Type:text/event-stream");
header('Cache-Control: no-control'); // recommended to prevent caching of event data.

include './connection.php';

$ip = $_GET['ip'];
$token = $_GET['token'];


// code Copied

$response = file_get_contents("http://ip-api.com/json/{$_GET['ip']}");
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
$chat = '';
// $i = '';
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
        $chat .= '<div style=background-color:#36454f;padding:.5%;border-radius:5px;width:100%;height:100%;display:grid;place-items:center;justify-content:center id=block_the_chat><div style=text-align:center><span><svg style=width:50px;margin:auto viewBox="0 0 24 24"xmlns=http://www.w3.org/2000/svg><path d="M12.865 3.00017L22.3912 19.5002C22.6674 19.9785 22.5035 20.5901 22.0252 20.8662C21.8732 20.954 21.7008 21.0002 21.5252 21.0002H2.47266C1.92037 21.0002 1.47266 20.5525 1.47266 20.0002C1.47266 19.8246 1.51886 19.6522 1.60663 19.5002L11.1329 3.00017C11.4091 2.52187 12.0206 2.358 12.4989 2.63414C12.651 2.72191 12.7772 2.84815 12.865 3.00017ZM10.9989 16.0002V18.0002H12.9989V16.0002H10.9989ZM10.9989 9.00017V14.0002H12.9989V9.00017H10.9989Z"fill=rgba(255,216,0,1)></path></svg><br><b style=color:gold>WARNING</b></span><p style=text-align:center;color:#fff>CHAT OUT OF SERVICE<br></div></div>';
    }else{
        if($query_to_check_if_chat_exist_row['typing'] == 'true'){

            $jsonData = json_decode($query_to_check_if_chat_exist_row['message'], true);
            $i = count($jsonData);
            $jsonData[$i] = array();
            $jsonData[$i][1] = 'typing';
            $jsonData[$i][2] = $date->format('j') . 'days : ' . $date->format('G') . 'hrs : ' . $date->format('i') . 'min : ' . $date->format('s') . 'sec';
            $jsonData[$i][3] = 'typing';
            $jsonData[$i][4] = 'delivered';

                
                    $count_msg = count($jsonData);
                    for($j=0;$j<$count_msg;$j++){
                        // $chat .= $jsonData[$j][3].',';
                        if($jsonData[$j][3] == 'user'){
                            $time = calculateTimeDifference($jsonData[$j][2]);
                            $chat .= '<div style="display: grid;margin:1.5% auto;"><div style="text-align:left;padding:1%;"><p style="text-align:left;margin:0;border-radius:5px;"><small style="font-size: small;"><b>you</b> ' . $time . '</small><br><span style="color:white;padding:.3% 3% .3% 1.5%;border-radius:5px;display: inline-block;background-color:'.$admin_row['user-color'].';overflow-wrap: break-word;" class="user-mesg-text">' . $jsonData[$j][1] . '</span><br><small >' . $jsonData[$j][4] . '</small></p></div></div>';
                        }elseif($jsonData[$j][3] == 'typing'){
                            $chat .= '<div style="display: flex;justify-content: right;margin:1.5% auto;height:50px;><div style="width:fit-content;text-align:right;padding:1%;"><p" class="loading"><div class="circle circle1"></div><div class="circle circle2"></div><div class="circle circle3"></div></p></div></div>';
                        }else{                    
                            
                            $time = calculateTimeDifference($jsonData[$j][2]);
                            $chat .= '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: right; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' .$jsonData[$j][3]. '</b> ' . $time . '</small><br><span class="admin-mesg-text" style=" display: inline-block;  color: white; padding: .3% 1.5% .3% 3%; border-radius: 5px;overflow-wrap: break-word;background-color:'.$admin_row['admin-color'].';">' . $jsonData[$j][1] . '</span><br><small>' . $jsonData[$j][4] . '</small></p></div></div>';
                        }
                    }

        }else{

            // FALSE
                    $jsonData = json_decode($query_to_check_if_chat_exist_row['message'], true);
                    $count_msg = count($jsonData);
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
            // FALSE
        }
    }
}

// code Copied
if($i){}

echo "data: " . json_encode(['chat'=>$chat, 'notification'=>$query_to_check_if_chat_exist_row['user_notification']]). "\n\n";

flush();
 
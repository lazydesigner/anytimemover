<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include './connection.php';

if($_POST['user'] == 'offline'){
    $ip = $_POST['ip'];
    $token = $_POST['token'];
    $update_chat_url = "UPDATE `chat` SET `status`='{$_POST['status']}' WHERE ip = '$ip' && admin_id = '$token'";
    $update_chat_url_result = mysqli_query($con, $update_chat_url);
    if(!$update_chat_url_result){
        echo json_encode(['error'=>'error']);
    }else{
        echo json_encode(['success'=>'success']);
    }
}elseif($_POST['user'] == 'typing-chat-admin'){
    $ip = $_POST['ip'];
    $token = $_POST['token'];
    $typing_status = $_POST['typing-status'];
    $update_chat_typing_status = "UPDATE `chat` SET `admin_typing` = '$typing_status' WHERE ip = '$ip' && admin_id = '$token'";
    $update_chat_typing_status_result = mysqli_query($con, $update_chat_typing_status);
    if(!$update_chat_typing_status_result){
        echo json_encode(['error'=>'error']);
    }else{
        echo json_encode(['success'=>'true']);
    }
}elseif($_POST['user'] == 'notification'){
    $ip = $_POST['ip'];
    $token = $_POST['token'];
    $update_chat_typing_status = "UPDATE `chat` SET `user_notification` = 0 WHERE ip = '$ip' && admin_id = '$token'";
    $update_chat_typing_status_result = mysqli_query($con, $update_chat_typing_status);
    if(!$update_chat_typing_status_result){
        echo json_encode(['error'=>'error']);
    }else{
        echo json_encode(['success'=>'true']);
    }
}

?>
<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");




include './connection.php';
$token = $_POST['token'];
$ip = $_POST['ip'];
$url = $_POST['url'];

$check_user_exist = "SELECT * FROM chat WHERE ip = '{$_POST['ip']}' && admin_id = '{$_POST['token']}'";

$user_exist_result = mysqli_query($con, $check_user_exist);

if (!mysqli_num_rows($user_exist_result) > 0) {
    $Admin_auth = "SELECT * FROM user INNER JOIN customise ON user.id = customise.user_id WHERE user.api_key = '$token'";
    $admin_result = mysqli_query($con, $Admin_auth);
    if ($admin_result) {
        $admin_row = mysqli_fetch_assoc($admin_result);
        $names = json_decode($admin_row['agent-name'], true);
        $images = json_decode($admin_row['agent-image'], true);

        function getRandomName()
        {
            global $names;
            $randomIndex = rand(0, count($names) - 1);
            return $names[$randomIndex];
        }
        function getRandomImage()
        {
            global $images;
            $randomIndex = rand(0, count($images) - 1);
            return $images[$randomIndex];
        }
        // Example usage
        $randomName = getRandomName();
        $randomImage = getRandomImage();

        $insert_user_query = "INSERT INTO chat (`ip`,`agent`,`email`,`phone`,`message`,`status`,`page`,`admin_id`,`agent-image`) VALUES ('$ip','$randomName','','','{}','true','$url','$token','$randomImage')";
        $insert_user_query_result = mysqli_query($con, $insert_user_query);
        if ($insert_user_query_result) {
            $selecting_chat_for_user = "SELECT * FROM chat WHERE ip = '$ip' && admin_id = '$token'";
            $selecting_chat_for_user_result = mysqli_query($con, $selecting_chat_for_user);
            $fetching_selected_chat_for_user = mysqli_fetch_assoc($selecting_chat_for_user_result);


            $chat_layout = '<span class=user-mesg-text></span><span class=admin-mesg-text></span><div class=open-the-chat id=open-the-chat style=' . $admin_row["chat-position"] . ':3%;><div class=notify id=notify></div><span><b>Chat With Us</b></span> <svg class="bi bi-chat-left-dots-fill"fill=currentColor height=20 viewBox="0 0 16 16"width=20 xmlns=http://www.w3.org/2000/svg><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></div><div class=chat style=background-color:' . $admin_row["background-color"] . ';bottom:' . $admin_row["bottom-position"] . '%;' . $admin_row["chat-position"] . ':' . $admin_row["left-right-position"] . '%; id=chat><div class=background-img><img src=https://dashboard.rapidautoshipping.com/chat/admin/uploads/' . $admin_row['background-image'] . '></div><input class=pk_solutions_input_fields value=' . $ip . ' id=ip hidden><input id=authtoken value="' . $_POST['token'] . '"hidden><div style=text-align:center;padding:1.5%;display:flex;justify-content:space-between;display:flex;align-items:center><span><img src=https://dashboard.rapidautoshipping.com/chat/united-states-flag-icon.svg style=width:30px></span><b style=text-align:center;font-size:20px>' . $admin_row["chat-heading"] . '</b> <span id=chat-closer-button style=font-size:xx-large;font-weight:bolder;cursor:pointer>×</span></div><div><div id=agent style=text-align:center;background-color:' . $admin_row["header-color"] . ';color:#fff;padding:2%><div class=pk_solutions_agent-div><div class=pk_solutions_agent-profile><div class=agent-online></div><img alt=""height=100% src="https://dashboard.rapidautoshipping.com/chat/admin/uploads/' . $fetching_selected_chat_for_user['agent-image'] . '"width=100% id="agent-image"></div><span id=agent-name style=text-align:left class=agent-name>' . $fetching_selected_chat_for_user['agent'] . '<br> <small>+1(000) 000-0000</small></span></div></div><div class=pk_solutions_chat-area id=pk_solutions_chat-area><div class=pk_solutions_hi-message id=pk_solutions_hi-message></div></div><div class=pk_solutions_chat-input><form class=pk_solutions_send_chat_form id=form_two><input class="pk_solutions_input_fields pk_solutions_chatus"id=pk_solutions_chatus name=""placeholder="' . $admin_row["placeholder"] . '"> <input class="pk_solutions_input_submit pk_solutions_send_chat"id=pk_solutions_send_chat value=Send type=submit disabled></form></div></div></div><audio id="notificationSound" src="https://dashboard.rapidautoshipping.com/chat/notification.wav" preload="auto"></audio>';


            echo json_encode(['status' => 200, 'chat_layout' => $chat_layout]);
        } else {
            echo json_encode(['error' => 'mysqli_error($con)']);
        }
    }
} else {
    $update_chat_url = "UPDATE `chat` SET `page` = '$url', `status`='true' WHERE `ip` = '$ip' && admin_id = '$token'";
    $update_chat_url_result = mysqli_query($con, $update_chat_url);
    if ($update_chat_url_result) {
        $Admin_auth = "SELECT * FROM user INNER JOIN customise ON user.id = customise.user_id WHERE user.api_key = '$token'";
        $admin_result = mysqli_query($con, $Admin_auth);
        if ($admin_result) {
            $admin_row = mysqli_fetch_assoc($admin_result);
            $selecting_chat_for_user = "SELECT * FROM chat WHERE ip = '$ip' && admin_id = '$token'";
            $selecting_chat_for_user_result = mysqli_query($con, $selecting_chat_for_user);
            $fetching_selected_chat_for_user = mysqli_fetch_assoc($selecting_chat_for_user_result);

            $chat_layout = '<span class=user-mesg-text></span><span class=admin-mesg-text></span><div class=open-the-chat id=open-the-chat style=' . $admin_row["chat-position"] . ':3%;><div class=notify id=notify></div><span><b>Chat With Us</b></span> <svg class="bi bi-chat-left-dots-fill"fill=currentColor height=20 viewBox="0 0 16 16"width=20 xmlns=http://www.w3.org/2000/svg><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></div><div class=chat style=background-color:' . $admin_row["background-color"] . ';bottom:' . $admin_row["bottom-position"] . '%;'. $admin_row["chat-position"] .':' . $admin_row["left-right-position"] . '%; id=chat><div class=background-img><img src=https://dashboard.rapidautoshipping.com/chat/admin/uploads/' . $admin_row['background-image'] . '></div><input class=pk_solutions_input_fields value=' . $ip . ' id=ip hidden><input id=authtoken value="' . $_POST['token'] . '"hidden><div style=text-align:center;padding:1.5%;display:flex;justify-content:space-between;display:flex;align-items:center><span><img src=https://dashboard.rapidautoshipping.com/chat/united-states-flag-icon.svg style=width:30px></span><b style=text-align:center;font-size:20px>' . $admin_row["chat-heading"] . '</b> <span id=chat-closer-button style=font-size:xx-large;font-weight:bolder;cursor:pointer>×</span></div><div><div id=agent style=text-align:center;background-color:' . $admin_row["header-color"] . ';color:#fff;padding:2%><div class=pk_solutions_agent-div><div class=pk_solutions_agent-profile><div class=agent-online></div><img alt=""height=100% src="https://dashboard.rapidautoshipping.com/chat/admin/uploads/' . $fetching_selected_chat_for_user['agent-image'] . '"width=100% id="agent-image"></div><span id=agent-name style=text-align:left class=agent-name>' . $fetching_selected_chat_for_user['agent'] . '<br> <small>+1(000) 000-0000</small></span></div></div><div class=pk_solutions_chat-area id=pk_solutions_chat-area><div class=pk_solutions_hi-message id=pk_solutions_hi-message></div></div><div class=pk_solutions_chat-input><form class=pk_solutions_send_chat_form id=form_two><input class="pk_solutions_input_fields pk_solutions_chatus"id=pk_solutions_chatus name=""placeholder="' . $admin_row["placeholder"] . '"> <input class="pk_solutions_input_submit pk_solutions_send_chat"id=pk_solutions_send_chat value=Send type=submit disabled></form></div></div></div><audio id="notificationSound" src="https://dashboard.rapidautoshipping.com/chat/notification.wav" preload="auto"></audio>';

            echo json_encode(['status' => 200, 'chat_layout' => $chat_layout]);
        }
    } else {
        echo json_encode(['error' => 'mysqli_error($con)']);
    }
}

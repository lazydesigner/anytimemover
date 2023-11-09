<?php include '../connection.php';
session_start(); ?>
<?php

if ($_POST['auth'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `user` WHERE `email` = '$username' && `password` = '$password' ";
    $res = mysqli_query($con, $query);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        // if(password_verify($pass, $row['password'])){
        $_SESSION['email'] = $row['email'];
        echo json_encode(['login' => 'Success']);
    }
}elseif($_POST['auth'] == 'userAuthenticated'){

    $token = $_POST['token'];
    // $token = explode("_",$token);
    // $username = $token[1];
    // $password = $token[2];
    $query = "SELECT * FROM user INNER JOIN customise ON user.id = customise.user_id WHERE user.api_key = '$token'";
    $res = mysqli_query($con, $query);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        echo json_encode(['chat'=>'<span class=user-mesg-text></span><span class=admin-mesg-text></span><div class=open-the-chat id=open-the-chat><div class=notify id=notify></div><span><b>Chat With Us</b></span> <svg class="bi bi-chat-left-dots-fill"fill=currentColor height=20 viewBox="0 0 16 16"width=20 xmlns=http://www.w3.org/2000/svg><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></div><div class=chat style=background-color:'.$row["background-color"].'; id=chat><input class=pk_solutions_input_fields id=ip hidden><input id=authtoken value="'.$_POST['token'].'"hidden><div style=text-align:center;padding:1.5%;display:flex;justify-content:space-between;display:flex;align-items:center><span>...</span><b style=text-align:center>'.$row["chat-heading"].'</b> <span id=chat-closer-button style=font-size:xx-large;font-weight:bolder;cursor:pointer>×</span></div><div><div id=agent style=text-align:center;background-color:'.$row["header-color"].';color:#fff;padding:2%><div class=pk_solutions_agent-div><div class=pk_solutions_agent-profile><div class=agent-online></div><img alt=""height=100% src=""width=100% id="agent-image"></div><span id=agent-name style=text-align:left class=agent-name></span></div></div><div class=pk_solutions_chat-area id=pk_solutions_chat-area><div class=pk_solutions_hi-message id=pk_solutions_hi-message></div></div><div class=pk_solutions_chat-input><form class=pk_solutions_email_form id=form><input class="pk_solutions_input_fields text"id=text name=""placeholder="Enter Your Email"> <input class=pk_solutions_input_fields id=pk_solutions_phone name=phone_number placeholder="Enter Your Phone"max=10 min=10 onkeyup=pk_formatPhoneNumber(this)> <input class="pk_solutions_input_submit pk_solutions_send_email"id=pk_solutions_send_email value=Send type=submit></form><form class=pk_solutions_send_chat_form id=form_two><input class="pk_solutions_input_fields pk_solutions_chatus"id=pk_solutions_chatus name=""placeholder="'.$row["placeholder"].'"> <input class="pk_solutions_input_submit pk_solutions_send_chat"id=pk_solutions_send_chat value=Send type=submit disabled></form></div></div></div><audio id="notificationSound" src="./notification.wav" preload="auto"></audio>']);
    }

}
?>
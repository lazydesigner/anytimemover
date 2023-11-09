<?php include '../connection.php' ?>

<?php

$id = file_get_contents('php://input');

$data = json_decode($id, true);

$i = $data['id'];

$a = $data['a'];


if ($a == 'id') {


        $sql = "SELECT * FROM chat WHERE id = $i";
        $res = mysqli_query($con, $sql);
        if($res){
            $query5 = "UPDATE `chat` SET `notification` = 0 WHERE id = $i";
            $res5 = mysqli_query($con, $query5);
        }
        $row = mysqli_fetch_assoc($res);

        $mess =  $row['message']; 

        echo json_encode(['mes' => $mess,'email'=>$row['email'], 'ip'=>$row['ip'], 'agent'=>$row['agent'],'page'=>$row['page']]);

}else if($a == 'msg'){

        $ip  = $data["ip"];

        $query = "UPDATE `chat` SET `message` = '$i' , `typing` = 'false', `user_notification` = 1 WHERE `ip`= '$ip'";
        $res = mysqli_query($con, $query);
        
        if($res){
        
            $query1 = "SELECT * FROM chat WHERE `ip` = '$ip'";
            $res1 = mysqli_query($con, $query1);
           
            $row = mysqli_fetch_assoc($res1);
            $mess = $row['message'];
            echo json_encode(['mes'=>$mess]);
        
        }else{
            echo mysqli_error($con);
        }

}else if($a == 'typing-chat'){
        $new_msg = $data['up-msg']; 
        $ip  = $data["ip"];

        $query = "UPDATE `chat` SET `message` = '$new_msg', `typing` = '$i'  WHERE `ip`= '$ip'";
        $res = mysqli_query($con, $query);

        echo json_encode(['success'=>'Admin Is Typing']);

}else if($a == 'typing-chat-admin'){

        $ip  = $data["ip"];

        $query = "UPDATE `chat` SET `admin_typing` = '$i'  WHERE `ip`= '$ip'";
        $res = mysqli_query($con, $query);

        echo json_encode(['success' => 'User Is Typing']);

}else if($a == 'typing-chat-to-false'){

        $ip  = $data["ip"];

        $query = "UPDATE `chat` SET `typing` = '$i'  WHERE `ip`= '$ip'";
        $res = mysqli_query($con, $query);
        
                echo json_encode(['success' => 'User Stopped Is Typing']);
       
}else if($a == 'user_notification'){

        $ip  = $data["ip"];

        $query = "UPDATE `chat` SET `user_notification` = 0  WHERE `ip`= '$ip'";
        $res = mysqli_query($con, $query);
        
        echo json_encode(['success' => 'User Stopped Is Typing']);
       
}else if($a == 'clear_chat'){
        $query = "UPDATE `chat` SET `message` = '{}' WHERE `id`= $i";
        $res = mysqli_query($con, $query);      
        if($res){
                echo json_encode(['success' => 'success', 'ip'=> $i]);
        }else{
                echo json_encode(['error' => 'Failed To Clean The Chat']);
        }
       
}else if($a == 'block_chat'){
        $query = "UPDATE `chat` SET `block_ip` = 'true' WHERE `id`= $i";
        $res = mysqli_query($con, $query);      
        if($res){
                echo json_encode(['success' => 'success', 'ip'=> $i]);
        }else{
                echo json_encode(['error' => 'Failed To block The Chat']);
        }
       
}else if($a == 'customise-chat'){
        
        $background_color = $data['background_color'];
        $background_image = $data['background_image'];
        $header_color = $data['header_color'];
        $user_color = $data['user_color'];
        $admin_color = $data['admin_color'];
        $chat_heading = $data['chat_heading'];
        $placeholder = $data['placeholder'];
        $chat_position = $data['chat_position'];
        $left_right_position = $data['left_right_position'];
        $bottom_position = $data['bottom_position'];
        $list_of_agent_name = $data['list_of_agent_name'];
        $list_of_agent_image = $data['list_of_agent_image'];

        $query = "UPDATE `customise` SET `background-color` = '$background_color',`background-image` = '$background_image', `header-color` = '$header_color', `user-color` = '$user_color', `admin-color` = '$admin_color', `chat-heading` = '$chat_heading', `placeholder` = '$placeholder', `agent-name` = '$list_of_agent_name',`chat-position` = '$chat_position' ,`left-right-position` = $left_right_position,`bottom-position` = $bottom_position, `agent-image` = '$list_of_agent_image' WHERE `id`= $i";

        $res = mysqli_query($con, $query);
        if($res){
                echo json_encode(['success'=>'Updated Successfuly']);
        }else{
                echo json_encode(['error'=>'Inserted Error'. mysqli_error($con)]);
        }
       
}else if($a == 'get_chat_detail'){
        
        $data = "SELECT * FROM `customise` WHERE `id`= $i";
        $res = mysqli_query($con, $data);
        if(mysqli_num_rows($res) > 0 ){
                $row = mysqli_fetch_assoc($res);
                echo json_encode(['background-color'=>$row['background-color'],'background-image'=>$row['background-image'],'header-color'=>$row['header-color'],'user-color'=>$row['user-color'],'admin-color'=>$row['admin-color'],'chat-heading'=>$row['chat-heading'],'placeholder'=>$row['placeholder'],'agent-name'=>$row['agent-name'],'agent-image'=>$row['agent-image'],'bottom-position'=>$row['bottom-position'],'left-right-position'=>$row['left-right-position'],'chat-position'=>$row['chat-position']]);
        }
       
}else if($a == 'logout'){
        session_start();
       // Destroy the session
       session_destroy();
       // Redirect the user to the login page
       echo json_encode(['logout'=>'Logout']);
              
}

?> 
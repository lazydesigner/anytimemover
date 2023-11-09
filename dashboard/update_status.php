<?php 
include_once './services/__api.php';

if($_POST['status'] == 'delivery'){
    $id = $_POST['delivered_number'];
    $true = $_POST['delivered'];
    $edit_query = "UPDATE form_qoute SET delivery_done='$true' where id = $id";
    $result = mysqli_query($con, $edit_query) or die("edit query failed");
    if($result){
        echo json_encode(['status'=>200]);
    }else{
        echo json_encode(['status'=>500]);
    }
}

?>
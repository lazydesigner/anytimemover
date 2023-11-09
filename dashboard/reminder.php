<?php 
include_once './services/__api.php';

$query = "SELECT * FROM `form_qoute` WHERE `delivery_done` = 'false'";
$resul = mysqli_query($con, $query);
if (mysqli_num_rows($resul) > 0){
    while ($row = mysqli_fetch_assoc($resul)){
        echo 'My Name Is '.$row['username'].' And My Email Id Is '.$row['email'];
    }
}else{
    echo 'Not Found';
}

?>
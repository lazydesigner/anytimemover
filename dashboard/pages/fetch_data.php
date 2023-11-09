<?php
include_once "../init.php";


$table = $_POST['option'];



if($table == "fq_services"){
    $sql = "SELECT * FROM services AS t1 INNER JOIN fq_services AS t2 ON t1.id = t2.i_id";
}else if ($table == "new_fq_services"){
    $sql = "SELECT * FROM new_services AS t1 INNER JOIN new_fq_services AS t2 ON t1.id = t2.i_id";
}else{
    $sql = "SELECT * FROM $table ";
}
$result = mysqli_query($con, $sql);

$output = "";

if($table == "services"){
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['title'].'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/services/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'"/service/edit/"'.$row['id'].'/services">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}
}else if($table == "new_services"){
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['title'].'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'/service/edit/'.$row['id'].'/new_services">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}
}else if($table == "blogs"){
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['title'].'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'/blogs/edit/'.$row['id'].'/blogs">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}
}else if($table == "new_blogs"){
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['title'].'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'/blogs/edit/'.$row['id'].'/new_blogs">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}
}else if($table == "fq_services"){
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['fq_id'].'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'/
f&qservices/edit/'.$row['fq_id'].'">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}
}else if($table == "new_fq_services"){    // rishabh
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['fq_id'].'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'/f&qservices/edit/'.$row['fq_id'].'">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}else{echo json_encode(['output'=>'No Data']);}
}else if($table == "new_state_to_state"){ 
    if(mysqli_num_rows($result)>0){
    while( $row = mysqli_fetch_assoc($result)){
        $output .= '  <tr>
                    <td>'. $row['state_form'].'</td>
                    <td>to</td>
                    <td>'. $row['state_to'] .'</td>
                    <td>'. $row['slug'] .'</td>
                    <td><button class="view_btn"><a href="https://rapidautoshipping.com/'. $row['slug'].'">View</a></button> <button class="edit_btn"><a href="'. home_path().'/state-to-state-new/edit/'. $row['state_id']. '">Edit</a></button></td>
                </tr>';
    }
    echo json_encode(['output'=>$output]);
}else{echo json_encode(['output'=>'No Data']);}
}




?>
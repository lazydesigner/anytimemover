<?php
include_once '../__api.php';

date_default_timezone_set('Asia/Kolkata');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    // $services_table = senitize_string($_POST['services_table']);    // rishabh
    $title = senitize_string($_POST['title']);
    $slug = senitize_string($_POST['slug']);
    $meta =  senitize_string($_POST['meta']);
    $h1 = senitize_string($_POST['h1']);
    $h1_about = senitize_string($_POST['point1']);
    // $h1_about = senitize_string($_POST['point2']);
    // $h1_about = senitize_string($_POST['point3']);
    $h2 = senitize_string($_POST['h2']);
    $h2_about = senitize_string($_POST['h2_about']);
    $content = senitize_string($_POST['content']);
     $timestamp= date('Y-m-d\TH:i:sP');
    // $models = $_POST['city_zip'];

        
    $sql_query = "INSERT INTO new_services (title, slug, meta, h1, h1_about, h2, h2_about, content,added_on) VALUES ('$title', '$slug', '$meta', '$h1', '$h1_about', '$h2', '$h2_about', '$content','$timestamp')";
    $insert = mysqli_query($con, $sql_query) or die("insert query failed");
    


    if($insert){
        header('LOCATION:'.home_path().'/service');
    }
    else{
        echo "not inserted";
    }

} 
?>
<?php
include_once '../__api.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id= $_POST['id'];
    $table_name = senitize_string($_POST['table_name']);
    $title = senitize_string($_POST['title']);
    $slug = senitize_string($_POST['slug']);
    $meta =  senitize_string($_POST['meta']);
    $h1 = senitize_string($_POST['h1']);
    $ponit1 = senitize_string($_POST['point1']);
    $ponit2 = senitize_string($_POST['point2']);
    $ponit3 = senitize_string($_POST['point3']);
    $h2 = senitize_string($_POST['h2']);
    $h2_about = senitize_string($_POST['h2_about']);
    $content = senitize_string($_POST['content']);
    // $models = $_POST['city_zip'];

    $sql_query = "UPDATE services SET title='$title', slug='$slug', meta='$meta', h1='$h1', ponit2='$ponit2', ponit3='$ponit3', ponit1='$ponit1', h2='$h2', h2_about='$h2_about', content='$content' where id = '$id'";

    $edit = mysqli_query($con, $sql_query) or die("edit query failed");

    if($edit){
        header('LOCATION:'.home_path().'/service');
    }
    else{
        echo "not edited";
    }

} 
?>
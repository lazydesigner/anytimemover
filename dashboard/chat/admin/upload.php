<?php
if($_POST['upload'] == 'image_upload'){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
        if($_FILES['image']['type'] == 'image/webp' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg'){
            $targetDirectory = 'uploads/';
            $targetFile = $targetDirectory . basename($_FILES['image']['name']);
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                echo json_encode(['success' => 'Image uploaded successfully.','image'=>$_FILES['image']['name'],'type'=>$_FILES['image']['type']]);
            } else {
                echo json_encode(['message' => 'Error uploading the image.']);
            }
        }else{
            echo json_encode(['image_type' => 'Required Image Type webp, png, jpg']);
        }
        
    } else {
        echo json_encode(['message' => 'Invalid request.']);
    }
}elseif($_POST['upload'] == 'image_unlink'){
    $filename = 'uploads/'.$_POST['filename'];
    if (file_exists($filename)) {
        if (unlink($filename)) {
            echo json_encode(['success' => 'Removed Successfully']);
        } else {
            echo json_encode(['error' => 'Unsuccessful']);
        }
    }else{
        echo json_encode(['success' => 'Removed Successfully']);
    }
}
?>

<?php
    include "../connect.php";
    $target_dir = "../bgMaps/";
    $name = "r".$_REQUEST["route"].".jpg";
    $target_file = $target_dir . basename($name);
    $uploadOk = false;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $uploadOk = true;
    }
    echo json_encode($uploadOk);
?>
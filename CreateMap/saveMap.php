<?php
    include "../connect.php";
    $uuid = $_REQUEST['uuid'];
    $x = $_REQUEST['x'];
    $y = $_REQUEST['y'];
    $sql = "update maps set x = $x , y = $y where uuid = '".$uuid."'";
    $res = mysqli_query($conn,$sql);
    echo json_encode($res);
?>
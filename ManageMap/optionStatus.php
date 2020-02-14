<?php
    include "../connect.php";
    $sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='maps' AND COLUMN_NAME='map_status'";
    $res = mysqli_query($conn,$sql);
    $json = "";
    $i= 0;
    while($row = mysqli_fetch_array($res)){
        preg_match("/^enum\(\'(.*)\'\)$/", $row['COLUMN_TYPE'], $matches);
        $enum = explode("','", $matches[1]);
        foreach($enum AS $v){
            $json.= "<option value='".$v."'>".$v."</option>";
        }
    }
    
    echo json_encode($json);
?>

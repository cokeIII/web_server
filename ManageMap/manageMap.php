<?php
    include "../connect.php";
    if(!empty($_REQUEST["getData"])){
        $sqlGet = "select * from maps";
        $resGet = mysqli_query($conn,$sqlGet);
        $table = '<div class="container"><table class="table" id="tableMaps">
                    <thead>
                        <th>UUID</th>
                        <th>x</th>
                        <th>y</th>
                        <th>name</th>
                        <th>route</th>
                        <th>status</th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                    </thead>
                    <tbody>';
        $tr = '';
        while($rowGet = mysqli_fetch_array($resGet)){
            $tr.='<tr>
                <td>'.$rowGet["uuid"].'</td>
                <td>'.$rowGet["x"].'</td>
                <td>'.$rowGet["y"].'</td>
                <td>'.$rowGet["name"].'</td>
                <td>'.$rowGet["route"].'</td>
                <td>'.$rowGet["map_status"].'</td>
                <td><button class="btn btn-warning mapsEdit" id="'.$rowGet["uuid"].'" data-toggle="modal" data-target="#editMapsModal">edit</button></td>
                <td><button class="btn btn-danger mapsDel" id="'.$rowGet["uuid"].'" data-toggle="modal" data-target="#deleteMapsModal">delete</button></td>
            </tr>';
        }
        $table.=$tr.'</tbody></table></div>';
        echo json_encode($table);
    }
    if(!empty($_REQUEST["getDetail"])){
        $uuid = $_REQUEST["uuid"];
        $sqlGetDetail = "select * from maps where uuid = '".$uuid."'";
        $resGetDetail = mysqli_query($conn,$sqlGetDetail);
        $data = [];
        while($rowGetDetail = mysqli_fetch_array($resGetDetail)){
            $data["uuid"] = $rowGetDetail["uuid"];
            $data["x"] = $rowGetDetail["x"];
            $data["y"] = $rowGetDetail["y"];
            $data["name"] = $rowGetDetail["name"];
            $data["route"] = $rowGetDetail["route"];
            $data["map_status"] = $rowGetDetail["map_status"];
        }
        echo json_encode($data);
    }
    if(!empty($_REQUEST["editMaps"])){
        $uuid = $_REQUEST["uuid"];
        $x = $_REQUEST["x"];
        $y = $_REQUEST["y"];
        $name = $_REQUEST["name"];
        $route = $_REQUEST["route"];
        $status = $_REQUEST["status"];
        $sqlEdit = "update maps set x = '".$x."',y = '".$y."',name = '".$name."',route = '".$route."',map_status = '".$status."' where uuid='".$uuid."'";
        $resEdit = mysqli_query($conn,$sqlEdit);
        echo json_encode($resEdit);
    }
?>
<?php
    include "../connect.php";
    if(!empty($_REQUEST["getData"])){
        $sqlGet = "select * from users";
        $resGet = mysqli_query($conn,$sqlGet);
        $table = '<div class="container">
                    <div class="row">
                        <button class="btn btn-primary m-3" data-toggle="modal" data-target="#insertUsersModal">Insert</button>
                    </div>
                    <table class="table" id="tableUsers">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Picture</th>
                        <th>Register Date</th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                    </thead>
                    <tbody>';
        $tr = '';
        while($rowGet = mysqli_fetch_array($resGet)){
            $tr.='<tr>
                <td>'.$rowGet["user_id"].'</td>
                <td>'.$rowGet["name"].'</td>
                <td>'.$rowGet["phone_number"].'</td>
                <td><a href="#" class="pic-users" val="'.$rowGet["pic_card"].'" data-toggle="modal" data-target="#picUsersModal">'.$rowGet["pic_card"].'</a></td>
                <td>'.$rowGet["user_date"].'</td>
                <td><button class="btn btn-warning usersEdit" id="'.$rowGet["device_id"].'" data-toggle="modal" data-target="#editUsersModal">edit</button></td>
                <td><button class="btn btn-danger usersDel submitDeleteUsers" id="'.$rowGet["device_id"].'" >delete</button></td>
            </tr>';
        }
        $table.=$tr.'</tbody></table></div>';
        echo json_encode($table);
    }
    if(!empty($_REQUEST["getDetail"])){
        $device_id = $_REQUEST["device_id"];
        $sqlGetDetail = "select * from users where device_id = '".$device_id."'";
        $resGetDetail = mysqli_query($conn,$sqlGetDetail);
        $data = [];
        while($rowGetDetail = mysqli_fetch_array($resGetDetail)){
            $data["device_id"] = $rowGetDetail["device_id"];
            $data["user_id"] = $rowGetDetail["user_id"];
            $data["name"] = $rowGetDetail["name"];
            $data["phone_number"] = $rowGetDetail["phone_number"];
            $data["pic_card"] = $rowGetDetail["pic_card"];
            $data["user_date"] = $rowGetDetail["user_date"];
        }
        echo json_encode($data);
    }
    if(!empty($_REQUEST["editUsers"])){
        move_uploaded_file($_FILES["picEdit"]["tmp_name"],"../pic_cards/".$_REQUEST["phone_numberEdit"].".jpg");
        $device_id = $_REQUEST["device_idEdit"];
        $user_id = $_REQUEST["user_idEdit"];
        $name = $_REQUEST["nameUEdit"];
        $phone_number = $_REQUEST["phone_numberEdit"];
        $pic_card = $_REQUEST["phone_numberEdit"].".jpg";
        $sqlEdit = "update users set user_id = '".$user_id."',name = '".$name."',phone_number = '".$phone_number."',pic_card = '".$pic_card."' where device_id='".$device_id."'";
        $resEdit = mysqli_query($conn,$sqlEdit);
        echo json_encode($resEdit);

    }
    if(!empty($_REQUEST["insertUsers"])){
        move_uploaded_file($_FILES["picInsert"]["tmp_name"],"../pic_cards/".$_REQUEST["phone_numberInsert"].".jpg");
        $device_id = $_REQUEST["device_idInsert"];
        $user_id = $_REQUEST["user_idInsert"];
        $name = $_REQUEST["nameUInsert"];
        $phone_number = $_REQUEST["phone_numberInsert"];
        $pic_card = $_REQUEST["phone_numberInsert"].".jpg";
        $sqlInsert = "insert into users (device_id,user_id,phone_number,name,pic_card) values('".$device_id."','".$user_id."', '".$phone_number."', '".$name."', '".$pic_card."')";
        $resInsert = mysqli_query($conn,$sqlInsert);
        echo json_encode($resInsert);
    }
    if(!empty($_REQUEST["deleteUsers"])){
        $device_id = $_REQUEST["device_id"];

        $sqlDeleteLog = "delete from user_log where device_id ='".$device_id."'";
        $resDeleteLog = mysqli_query($conn,$sqlDeleteLog);
        if($resDeleteLog){
            $sqlDelete = "delete from users where device_id ='".$device_id."'";
            $resDelete = mysqli_query($conn,$sqlDelete);
            echo json_encode($resDelete);
        } else {
            echo json_encode($resDeleteLog);
        }
    }
?>
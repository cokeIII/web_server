<?php 
include "../connect.php";

function countUser($conn,$uuid){
    $sqlUserCount = "select count(device_id) as num from user_log where uuid = '".$uuid."' and status != 'finish'  and date(date_time) = CURRENT_DATE";
    $resUserCount = mysqli_query($conn,$sqlUserCount);
    $rowUserCount = mysqli_fetch_array($resUserCount);
    return $rowUserCount["num"];
}

if(!empty($_REQUEST["logUser"])){ 
    $sqlGetMap = "select * from maps where route = 1";
    $sqlGetOpt = "select route from maps group by route";
    $resOpt = mysqli_query($conn,$sqlGetOpt);
    $resMap = mysqli_query($conn,$sqlGetMap);
    $route = '';
    while($rowOpt = mysqli_fetch_array($resOpt)){
        $route.='<div class="col-md-1 btn menu-log" id="'.$rowOpt["route"].'">'.$rowOpt["route"].'</div>'; 
        
    }
    $maps = '';
    $Tmaps = '';
    while($rowMap = mysqli_fetch_array($resMap)){
        $Tmaps.= '<tr>
                    <th scope="row">'.$rowMap["name"].'</th>
                    <td>'.countUser($conn,$rowMap["uuid"]).'</td>
                    <td><a href="#" val="'.$rowMap["uuid"].'" class="detailPoint" data-toggle="modal" data-target="#myModal">detail</a></td>
                </tr>';
 
        $maps.='<div selected="true" id="'.$rowMap["uuid"].'" class="point" style="left:'.($rowMap["x"]).'%;
                            top: '.($rowMap["y"]).'%;
                            background-color: rgb(226, 51, 51);
                            border: 4px solid #73AD21;
                            border-color: black;
                            border-radius:  10%;
                            width: 48px;
                            height: 48px;
                            position: absolute;
                            font-size: 12px;
                            margin-bottom: 5%;
                ">'.$rowMap["name"].'</div>';  
    }
    $data = '

    <div id="mapContent">
        <div class="row">
            '.$route.'
        </div>
        <div class="row" >
            <div  class="offset-5 txt-route" id="nameRoute"></div>
        </div>
        <div class="row">
            <div id="bgMap" class="col-md-5 bg-map">'.$maps.'</div>
            <div class="col-md-5">
                <table class="table" style="margin-top: 12%;">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ponit</th>
                        <th scope="col">user count</th>
                        <th scope="col">detail</th>
                    </tr>
                    </thead>
                    <tbody id="Tmaps">
                    '.$Tmaps.'
                    </tbody>
                </table>
            </div>
        </div>
    </div>';

    echo json_encode($data);
}
if(!empty($_REQUEST["route"])){ 
    $route = $_REQUEST["route"];
    $maps = '';
    $Tmaps = '';
    $sqlGetMap = "select * from maps where route = $route";
    $resMap = mysqli_query($conn,$sqlGetMap);

    while($rowMap = mysqli_fetch_array($resMap)){
        $Tmaps.= '<tr>
            <th scope="row">'.$rowMap["name"].'</th>
            <td>'.countUser($conn,$rowMap["uuid"]).'</td>
            <td><a href="#" val="'.$rowMap["uuid"].'" class="detailPoint" data-toggle="modal" data-target="#myModal" >detail</a></td>
        </tr>';

        $maps.='<div selected="true" id="'.$rowMap["uuid"].'" class="point" style="left:'.($rowMap["x"]).'%;
                            top: '.($rowMap["y"]).'%;
                            background-color: rgb(226, 51, 51);
                            border: 4px solid #73AD21;
                            border-color: black;
                            border-radius:  10%;
                            width: 48px;
                            height: 48px;
                            position: absolute;
                            font-size: 12px;
                ">'.$rowMap["name"].'</div>';  
    }
    $mapsData["maps"] = $maps;
    $mapsData["Tmaps"] = $Tmaps;
    echo json_encode($mapsData);
}
if(!empty($_REQUEST["datailPoint"])){ 
    $Tdetail = '';
    $uuid = $_REQUEST["uuid"];
    $sqlGetDetail = "select u.*,l.* from user_log l, users u where l.device_id = u.device_id and l.status != 'finish' and l.uuid = '".$uuid."' and date(l.date_time) = CURRENT_DATE";
    $resDetail = mysqli_query($conn,$sqlGetDetail);
    while($rowDetail = mysqli_fetch_array($resDetail)){
        $Tdetail.= '<tr>
            <th scope="row">'.$rowDetail["user_id"].'</th>
            <td>'.$rowDetail["name"].'</td>
            <td>'.$rowDetail["phone_number"].'</td>
            <td><button val="'.$rowDetail["pic_card"].'" data-toggle="modal" data-target="#picModal" class="btn btn-info pic-card">picture</button></td>
            <td>'.$rowDetail["user_date"].'</td>
            <td>'.$rowDetail["date_time"]."  ".$rowDetail["status"].'</td>
        </tr>';
    }
    echo json_encode($Tdetail);
}
?>

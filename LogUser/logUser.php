<?php 
include "../connect.php";

function countUser($conn,$uuid){
    $sqlUserCount = "select count(device_id) as num from user_log where uuid = '".$uuid."' and status != 'finish'  and date(date_time) = CURRENT_DATE";
    $resUserCount = mysqli_query($conn,$sqlUserCount);
    $rowUserCount = mysqli_fetch_array($resUserCount);
    return $rowUserCount["num"];
}
function checkDetours($conn,$uuid){
    $sqlcheckDetours = "select uuid,status from user_log where uuid = '".$uuid."' and date(date_time) = CURRENT_DATE";
    $rescheckDetours = mysqli_query($conn,$sqlcheckDetours);
    while($rowcheckDetours = mysqli_fetch_array($rescheckDetours)){
        if($rowcheckDetours["status"] == "detours")
            return $rowcheckDetours["status"];
    }
}

if(!empty($_REQUEST["lookup"])){
    $sqlGetMaps = "select uuid,route from maps";
    $resMaps = mysqli_query($conn,$sqlGetMaps);
    while($rowMaps = mysqli_fetch_array($resMaps)){
        $lookupMaps[$rowMaps['uuid']] = $rowMaps['route'];
    }
    echo json_encode($lookupMaps);
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
        $Tmaps.= '<tr class="'.checkDetours($conn,$rowMap["uuid"]).'" id="tr'.str_replace(":","",$rowMap["uuid"]).'">
                    <th scope="row">'.$rowMap["name"].'</th>
                    <td id="td'.str_replace(":","",$rowMap["uuid"]).'">'.countUser($conn,$rowMap["uuid"]).'</td>
                    <td><a href="#" val="'.$rowMap["uuid"].'" class="detailPoint" data-toggle="modal" data-target="#myModal">detail</a></td>
                </tr>';
 
        $maps.='<div id="'.$rowMap["uuid"].'" class="pointL" style="left:'.($rowMap["x"]).'%;
                            top: '.($rowMap["y"]).'%;
                            background-color: rgb(226, 51, 51);
                            border: 1px solid #73AD21;
                            border-color: black;
                            border-radius:  50%;
                            width: 37px;
                            height: 37px;
                            position: absolute;
                            font-size: 15px;
                            margin-bottom: 5%;
                ">'.$rowMap["name"].'</div>';  
    }

    $data = '


    <div id="mapContent">  
    <div class="col-md-12 bk">
          <h5>Choose a route</h5> 
          <div class="">'.$route.'</div>
          <div  class="offset-0 txt-route" id="nameRoute"></div>
    </div>
  

     <div class="row ">

            <div class=" col-md-5 bk-rightu   " style="margin-top: 3%;">
                <img id="imgMaps" src="bgMaps/r1.jpg" width="530px" height="1520px" ><div  id="bgMapL">'.$maps.'</div>
            </div>
            
            <div class="col-md-5 " style="margin-top: -3%;">
                <table class="table bk-reftu ">
                    <thead class="thead-dark"style="background: #9966CC;">
                    <tr>
                        <th scope="col ">ponit</th>
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
        $Tmaps.= '<tr class="'.checkDetours($conn,$rowMap["uuid"]).'" id="tr'.str_replace(":","",$rowMap["uuid"]).'">
            <th scope="row">'.$rowMap["name"].'</th>
            <td id="td'.str_replace(":","",$rowMap["uuid"]).'">'.countUser($conn,$rowMap["uuid"]).'</td>
            <td><a href="#" val="'.$rowMap["uuid"].'" class="detailPoint" data-toggle="modal" data-target="#myModal" >detail</a></td>
        </tr>';

        $maps.='<div  id="'.$rowMap["uuid"].'" class="pointL" style="left:'.($rowMap["x"]).'%;
                            top: '.($rowMap["y"]).'%;
                            background-color: rgb(226, 51, 51);
                            border: 1px solid #73AD21;
                            border-color: black;
                            border-radius:  50%;
                            width: 37px;
                            height: 37px;
                            position: absolute;
                            font-size: 15px;
                ">'.$rowMap["name"].'</div>';  
    }
    $mapsData['Tmaps'] = $Tmaps;
    $mapsData['maps'] = $maps;
    echo json_encode($mapsData);
}
if(!empty($_REQUEST["datailPoint"])){ 
    $Tdetail = '';
    $uuid = $_REQUEST["uuid"];
    $sqlGetDetail = "select u.*,l.* from user_log l, users u where l.device_id = u.device_id and l.status != 'finish' and l.uuid = '".$uuid."' and date(l.date_time) = CURRENT_DATE";
    $resDetail = mysqli_query($conn,$sqlGetDetail);
    while($rowDetail = mysqli_fetch_array($resDetail)){
        $Tdetail.= '<tr class="'.$rowDetail["status"].'">
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
if(!empty($_REQUEST["TcountUsers"])){
    $data = [];
    $sqlUserCounts = "select uuid,count(*) as num  from user_log where uuid in(select uuid from maps) and status != 'finish'  and date(date_time) = CURRENT_DATE group by uuid";
    $resUserCounts = mysqli_query($conn,$sqlUserCounts);
    while($rowUserCounts = mysqli_fetch_array($resUserCounts)){
        $keys = "#td".str_replace(":","",$rowUserCounts["uuid"]);
        $data[$keys] = $rowUserCounts["num"];
    }
    echo json_encode($data);
}
?>

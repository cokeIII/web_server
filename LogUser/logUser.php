<?php 
include "../connect.php";
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
    while($rowMap = mysqli_fetch_array($resMap)){
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
        <div id="bgMap" class="bg-map">'.$maps.'</div>
    </div>';

    echo json_encode($data);
}
if(!empty($_REQUEST["route"])){ 
    $route = $_REQUEST["route"];
    $maps = '';
    $sqlGetMap = "select * from maps where route = $route";
    $resMap = mysqli_query($conn,$sqlGetMap);
    while($rowMap = mysqli_fetch_array($resMap)){
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

    echo json_encode($maps);
}
?>

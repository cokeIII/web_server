<?php 
include "../connect.php";
if(!empty($_REQUEST["createMap"])){ 
    $sqlGetMap = "select * from maps where route = 1";
    $sqlGetOpt = "select route from maps group by route";
    $resOpt = mysqli_query($conn,$sqlGetOpt);
    $resMap = mysqli_query($conn,$sqlGetMap);
    
    $opt = '';
    while($rowOpt = mysqli_fetch_array($resOpt)){
        $opt.='<option value="'.$rowOpt["route"].'">'.$rowOpt["route"].'</option>';  
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
            <div class="col-md-5">
                <div class="form-group">
                    Select Map :
                    <select id="route" class="form-control">'
                    .$opt.
                    '
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <input type="button" class="btn btn-primary mt-4" id="btnSaveMap" value="Save Map"/>
            </div>
            <div class="col-md-3">
                <form action="" id="formBgMaps" enctype="multipart/form-data">
                    <label for="bgMaps">Change background route <p style="display:inline" id="routeTxt"></p></label>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="file" name="fileToUpload" class="form-control" id="bgMaps"/>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="bgMap" class="bg-map"><img id="imgMaps" src="bgmaps/r1.jpg" width="720" height="1520" >'.$maps.'</div>
    </div>';

    echo json_encode($data);
}
if(!empty($_REQUEST["route"])){ 
    $route = $_REQUEST["route"];
    $maps = '<img id="imgMaps" src="" width="720" height="1520" >';

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

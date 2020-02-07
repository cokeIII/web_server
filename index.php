<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>off track alert</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/index.css?version=51" rel="stylesheet"  id="mainCss" type="text/css">
  <?php include "connect.php"; ?>

</head>
<style>
.top{margin-top: -20px;}
</style>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">OFF TRACK ALERT</a>

  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "sideBar.php";?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <div style="height:50px;">
          <div id="info"></div>
        </div>
        <div id="display">
          <div class="row top text-right ">
            <div class="col-md-1">
              <img src="img/icon.png" class="top" style="width:80%">
            </div>
            <div class=" col-md-4 text-left"style="color:#AAAAAA; background-color:;">
              <h4 class="top"><b>OFF-TRACK ALERT SYSTEM</b></h4>
              <h4 >ระบบแจ้งเตือนการออกนอกเส้นทาง:</h4>
            </div>
                  <!-- <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div>
                  <div class=" col-sm-1 col-md-1"><img src="img/" style="width:100%"></div> -->
          </div>
          <div class="row ">
            <div class=" col-sm-12 col-md-12 text-center ">
              <img src="img/78785138_432629684352366_7393726809256230912_n.png" style="width:11%">
              <img src="img/78785138_432629684352366_7393726809256230912_n.png" style="width:11%">
            </div>
          </div>
          <div class="row ">
            <div class=" col-sm-12 col-md-12 text-center "><img src="img/setIO.png" class="top" style="width:13%"><img src="img/setAN.png" class="top" style="width:13%"></div> 
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center " style=""><br><h2 class="text-muted">Setup Application</h2><BR></div>
            <div class="col-md-2"></div>
          </div>
          <div class="row ">
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-2 col-md-2 text-right"><img src="img/79290086_1321026251402321_4641371651261333504_n.jpg" style="width:80%"></div>
            <div class=" col-sm-2 col-md-2 text-center"><img src="img/78919685_1321026104735669_5886422283131551744_n.jpg" style="width:80%"></div>
            <div class=" col-sm-2 col-md-2 text-left"><img src="img/78858148_508563379741014_3512251120242130944_n.png" style="width:80%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4 text-center" style=""><br><h6 class="text-muted  text-right">   Download: http://202.129.16.68/~offtduac/offduac.apk </h6></div>
            <div class="col-md-5"></div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center " style=""><br><br><h2 class="text-muted">Implementation</h2><br></div>
            <!-- <div class="col-md-6 text-center bgtest" style=""><br><br><h2 class="text-muted">Setup Application</h2></div> -->
          </div>
          <div class="row">
            <div class="col-md-6 text-center " style="">
              <img src="img/ibeaconpattern.png" style="width:80%">
            </div>
            <div class="col-md-6 text-center  " style=" ">
                <p class="text-left">iBeacon</p>
                <p class="text-left">This is used for user facing services such as retail marketing and visitor spaces such as museums. It works on iOS and Android and needs your app to be installed by end-users. See the article on trigger data and the solutions directory for ready-made server solutions that use iBeacon.</p>
                <p class="text-left">Sensing</p>
                <p class="text-left">This is used for IoT proximity and sensing scenarios. Apps or a Bluetooth gateway read sensor data and forward it to a server. The Bluetooth part can also use Bluetooth mesh to relay data across a site or area.</p>
                <p class="text-left">Tracking</p>
                <p class="text-left">This is used for tracking items or people with an audio alarm on the phone and/or beacon if the item being tracked goes out of range. It can also be used to detect a beacon button press and cause something to happen, for example take a camera photo, on the phone.
                                    This scenario uses the advertising data to detect beacons and Bluetooth GATT to connect to them.</p>
            </div>
          </div>

          <div class="row">
              <div class="col-md-12 text-center"><BR></div>
          </div>
          <div class="row">
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
            <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center " style=""><br><h2 class="text-muted">Settings iBeacon</h2><BR></div>
            <div class="col-md-2"></div>
          </div>
          <div class="row ">
              <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
              <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
              <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
              <div class=" col-sm-2 col-md-2 text-right"><img src="img/79151290_452539855446670_8174389715768705024_n.png" style="width:80%"></div>
              <div class=" col-sm-2 col-md-2 text-center"><img src="img/79925532_1798397696957547_5051774811689189376_n.png" style="width:80%"></div>
              <div class=" col-sm-2 col-md-2 text-left"><img src="img/79229027_3465565780150821_1408827604701544448_n.png" style="width:80%"></div>
              <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
              <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
              <div class=" col-sm-1 col-md-1"><img src="" style="width:100%"></div>
          </div>
          <div class="row">
            <div class="col-md-12"><br/></div>
            <div class="col-md-12"><br/></div>
            <div class="col-md-12"><br/></div>
          </div>
        </div>
    </div>
    <!-- /.content-wrapper -->   
  </div>
  <!-- Sticky Footer -->
  <?php include "foot.php"; ?>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript-->
  <!-- <link href="css/uploadfile.css" rel="stylesheet"> -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- <script src="js/jquery.uploadfile.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!--  Script this page -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
  <script>
    var lookupMaps = {}
      // localStorage.clear();
    if(!localStorage["lookupDetours"]){
      localStorage["lookupDetours"] = "{}"
    }
    var lookupDetours = JSON.parse(localStorage["lookupDetours"])
    console.log(lookupDetours)
    $(document).on("click","#menuLogUser",function(){
      $.ajax({
          url: 'LogUser/logUser.php',
          dataType:'json',
          type: 'post',
          data: { lookup: true },  // data to submit
          success: function (data, status) {
            lookupMaps = data
          },
          error: function ( errorMessage) {
              console.dir('Error' + errorMessage);
          }
      })
    })

    var socket = io.connect('http://202.129.16.68:7778');
    socket.on('connect',function(data) {
        // console.log(data)
        socket.emit('join','Hello world from client');
    });
    socket.on('join',function(data){
        console.log(data)
    })
    socket.on('/',function(data){
        console.log(data)
    })
    socket.on('updateUserLog',function(data){
      console.log(data)
      $(document).find(".menu-log").removeClass("detours")
      $.each( lookupDetours, function( key, value ) {
        delete lookupDetours[key][data.deviceId]
      })
      if(!lookupDetours[data.uuid]) {lookupDetours[data.uuid] = {}}
      let deviceId = data.deviceId
      lookupDetours[data.uuid][deviceId] = data.status
      localStorage["lookupDetours"] = JSON.stringify(lookupDetours)
      // console.log(lookupDetours)
      if(Object.keys(lookupDetours).length){
        $.each( lookupMaps, function( key, value ) {
          let uuid = key
          let detours = false
          $.each( lookupDetours[key], function( key, value ) {
            // console.log(value)
            if(value == "detours"){
              detours = true
              // console.log(detours)
              $(document).find("#"+lookupMaps[uuid]).addClass("detours")
              return
            }
          })
          if(detours){
            // console.log(lookupMaps[uuid])
            $(document).find("#tr"+uuid.replace(/\:/g, '')).addClass("detours")
          } else {
            $(document).find("#tr"+uuid.replace(/\:/g, '')).removeClass("detours")
          }
        })
      }
      $.ajax({
          url: 'LogUser/logUser.php',
          dataType:'json',
          type: 'post',
          data: { TcountUsers: true},  // data to submit
          success: function (data, status) {
              // console.dir('status: ' + status + ', data: ' + data);
              // console.log(data)
              $.each( lookupMaps, function( key, value ) {
                let id = "#td"+key.replace(/\:/g, '')
                if(data[id]){
                  $(document).find(id).html(data[id])
                } else {
                  $(document).find(id).html('0')
                }
              });
          },
          error: function ( errorMessage) {
              console.dir('Error' + errorMessage);
          }
      })
    })


  </script>
  <script src="js/index.js"></script>

</body>

<!-- Modal Detail-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 800px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Users</h4>
      </div>
      <div class="modal-body">
        <table class="table" id="tableUserDetail">
          <thead class="thead-dark">
          <tr>
              <th scope="col">ID card</th>
              <th scope="col">user name</th>
              <th scope="col">tel</th>
              <th scope="col">picture</th>
              <th scope="col">Application date</th>
              <th scope="col">status</th>
          </tr>
          </thead>
          <tbody id="modalLoguser">
          </tbody>
        </table>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal Picture-->
<div id="picModal" class="modal fade pic-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 650px;">
      <div class="modal-header">
        <button type="button" class="close close-pic-modal" >&times;</button>
        <h4 class="modal-title">Picture Card</h4>
      </div>
      <div class="modal-body">
        <img id="picCard" src="" width="500" height="300"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-pic-modal" >Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal editMaps-->
<div id="editMapsModal" class="modal fade mapsEdit-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close "  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Map</h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
        <div class="form-group">
            <label for="uuidEdit">UUID :</label>
            <input type="text" class="form-control" id="uuidEdit" readonly>
          </div>
          <div class="form-group">
            <label for="uuid_iosEdit">UUID IOS :</label>
            <input type="text" class="form-control" id="uuid_iosEdit">
          </div>
          <div class="form-group">
            <label for="xEdit">x:</label>
            <input type="number" class="form-control" id="xEdit" required>
          </div>
          <div class="form-group">
            <label for="yEdit">y:</label>
            <input type="number" class="form-control" id="yEdit" required>
          </div>
          <div class="form-group">
            <label for="nameEdit">name:</label>
            <input type="text" class="form-control" id="nameEdit" required>
          </div>
          <div class="form-group">
            <label for="routeEdit">route:</label>
            <input type="number" class="form-control" id="routeEdit" required>
          </div>
          <div class="form-group">
            <label for="statusEdit">status:</label>
            <select id="statusEdit" class="form-control" required> 
              <option value="N">N</option> 
              <option value="S">S</option> 
              <option value="E">E</option> 
            </select>
          </div>
          <button type="submit" class="btn btn-warning" id="submitEditMaps">Edit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal insertMaps-->
<div id="insertMapsModal" class="modal fade mapsInsert-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close "  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert Map</h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
        <div class="form-group">
            <label for="uuidInsert">UUID :</label>
            <input type="text" class="form-control" id="uuidInsert" required>
          </div>
          <div class="form-group">
            <label for="uuid_iosInsert">UUID IOS :</label>
            <input type="text" class="form-control" id="uuid_iosInsert" required>
          </div>
          <div class="form-group">
            <label for="xInsert">x:</label>
            <input type="number" class="form-control" id="xInsert" required>
          </div>
          <div class="form-group">
            <label for="yInsert">y:</label>
            <input type="number" class="form-control" id="yInsert" required>
          </div>
          <div class="form-group">
            <label for="nameInsert">name:</label>
            <input type="text" class="form-control" id="nameInsert" required>
          </div>
          <div class="form-group">
            <label for="routeInsert">route:</label>
            <input type="number" class="form-control" id="routeInsert" required>
          </div>
          <div class="form-group">
            <label for="statusInsert">status:</label>
            <select id="statusInsert" class="form-control" required> 
              <option value="N">N</option> 
              <option value="S">S</option> 
              <option value="E">E</option> 
            </select>
          </div>
          <button type="submit" class="btn btn-primary" id="submitInsertMaps">Insert</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal editUsers-->
<div id="editUsersModal" class="modal fade usersEdit-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close "  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Users</h4>
      </div>
      <div class="modal-body">
        <form action="" id="formEditUsers">
        <input type="hidden" name="editUsers" value="true">
        <input type="hidden" name="device_idEdit" class="form-control" id="device_idEdit">
          <div class="form-group">
            <label for="users_idEdit">ID :</label>
            <input type="text" name="user_idEdit" class="form-control" maxlength="13" id="user_idEdit" >
          </div>
          <div class="form-group">
            <label for="nameUEdit">name:</label>
            <input type="text" name="nameUEdit" class="form-control" id="nameUEdit" >
          </div>
          <div class="form-group">
            <label for="phone_numberEdit">phone:</label>
            <input type="text" name="phone_numberEdit" class="form-control" id="phone_numberEdit" maxlength="10" required>
          </div>
          <div class="form-group">
            <label for="picEdit">picture:</label>
            <input type="file" name="picEdit" class="form-control" id="picEdit">
          </div>
          <button type="submit" class="btn btn-warning" id="submitEditUsers">Edit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal insertUsers-->
<div id="insertUsersModal" class="modal fade usersInsert-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close "  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert Users</h4>
      </div>
      <div class="modal-body">
        <form action="" id="formInsertUsers" enctype="multipart/form-data">
          <input type="hidden" name="insertUsers" value="true">
          <div class="form-group">
            <label for="device_idInsert">Device ID :</label>
            <input type="text" name="device_idInsert" class="form-control" id="device_idInsert" required>
          </div>
          <div class="form-group">
            <label for="users_idInsert">ID :</label>
            <input type="text" name="user_idInsert" class="form-control" id="users_idInsert" maxlength="13">
          </div>
          <div class="form-group">
            <label for="nameUInsert">name:</label>
            <input type="text" name="nameUInsert" class="form-control" id="nameUInsert" >
          </div>
          <div class="form-group">
            <label for="phon_numberInsert">phone:</label>
            <input type="number" name="phone_numberInsert" class="form-control" id="phone_numberInsert" maxlength="10" required>
          </div>
          <div class="form-group">
            <label for="picInsert">picture:</label>
            <input type="file" name="picInsert" class="form-control" id="picInsert">
          </div>
          <button type="submit" class="btn btn-primary" id="submitInsertUsers">Insert</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal pictUsers-->
<div id="picUsersModal" class="modal fade usersPic-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 600px;">
      <div class="modal-header">
        <button type="button" class="close "  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pic Users</h4>
      </div>
      <div class="modal-body" >
        <img src="" alt="" id="picUsers" width="500" height="350">
      </div>
      <div class="modal-footer">
        <button class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>

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
  <link href="css/index.css" rel="stylesheet">
  <?php include "connect.php"; ?>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">OFF TRACK ALERT</a>

  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "sideBar.php";?>
    <div id="content-wrapper">

      <div class="container-fluid">
        <div id="info"></div>
        <div id="display"></div>
      </div>
      <!-- /.container-fluid -->


    </div>
    <!-- /.content-wrapper -->
    
  </div>
  <!-- Sticky Footer -->
  <?php include "foot.php"; ?>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
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
  <!-- <script src="https://code.jquery.com/jquery-1.11.1.js"></script> -->
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

    var socket = io.connect('http://localhost:3000');
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
        console.log(lookupMaps[data.uuid])
        lookupDetours[data.deviceId]= data.status
        localStorage["lookupDetours"] = JSON.stringify(lookupDetours)
        console.dir(localStorage["lookupDetours"])
        console.log(Object.keys(lookupDetours).length)
        let id = "#td"+data.uuid.replace(/\:/g, '');
        console.log(id)
        $(document).find(id).html("5")
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

</html>

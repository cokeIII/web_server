$(document).ready(function(){
    console.log("Run Script")
    //Create Map
    var pointID = "" 
    $(document).on("click","#menuCreate",function(){
        pointID = ""
        $.ajax({
            url: 'CreateMap/createMap.php',
            dataType:'json',
            type: 'post',
            data: { createMap: true },  // data to submit
            success: function (data, status) {
                $("#display").html(data)
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        });
    })
    $(document).on("change","#route",function(){
        pointID = ""
        $.ajax({
            url: 'CreateMap/createMap.php',
            dataType:'json',
            type: 'post',
            data: { route: $(this).val() },  // data to submit
            success: function (data, status) {
                $(document).find("#bgMap").html(data)
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        });
    })
    $(document).on("click",".point",function(){
        var point = $(this).position()
        $(".point").css({"border-color": "black", 
        "border-width":"4px", 
        "border-style":"solid"})
        pointID = $(this).clone(false)
        // console.log("Top: " + ((point.top/$("#bgMap").height() * 100)) + " Left: " + (point.left/$("#bgMap").width() * 100))
        $(this).remove()
    })
    $(document).on("click","#bgMap",function(event){
        var hp = ThzhotspotPosition(event, $(this), 48, true)
        var hotspot = pointID.css({
            left: hp.x,
            top: hp.y,
            "border-color": "#C1E0FF", 
            "border-width":"4px", 
            "border-style":"solid"
          });
          $(this).append(hotspot);
    })
    function ThzhotspotPosition(evt, el, hotspotsize, percent) {
        var left = el.offset().left;
        var top = el.offset().top;
        var hotspot = hotspotsize ? hotspotsize : 0;
        if (percent) {
          x = (evt.pageX - left - (hotspot / 2)) / el.outerWidth() * 100 + '%';
          y = (evt.pageY - top - (hotspot / 2)) / el.outerHeight() * 100 + '%';
        } else {
          x = (evt.pageX - left - (hotspot / 2));
          y = (evt.pageY - top - (hotspot / 2));
        }
      
        return {
          x: x,
          y: y
        };
    }
    $(document).on("click","#btnSaveMap",function(){
        var dataMap = {}
        $(document).find('.point').each(function(i, obj) {
            var point = $(this).position()
            dataMap['uuid'] = $(this).attr("id")
            dataMap['x'] = (point.left/$("#bgMap").width() * 100).toFixed(2)
            dataMap['y'] = (point.top/$("#bgMap").height() * 100).toFixed(2)
            console.log(dataMap)
        });
        $.ajax({
            url: 'CreateMap/saveMap.php',
            dataType:'json',
            type: 'post',
            data: dataMap,  // data to submit
            success: function (data, status) {
                if(data){
                    info("success"," Save Map ")
                } else {
                    info("danger"," Can't Save Map ")
                }
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        });

    })
    function info(status,text){
        if(status == "success"){
            $(function() {
                $('<div class = "alert alert-success" ><strong>Success !</strong>'+text+'</div>')
                .insertBefore('#info')
                .delay(3000)
                .fadeOut(function() {
                  $(this).remove(); 
                });
            });
        } else if(status == "info") {
            $(function() {
                $('<div class = "alert alert-info" ><strong>Info !</strong>'+text+'</div>')
                .insertBefore('#info')
                .delay(3000)
                .fadeOut(function() {
                  $(this).remove(); 
                });
            });
        } else if(status == "warning") {
            $(function() {
                $('<div class = "alert alert-warning" ><strong>Warning !</strong>'+text+'</div>')
                .insertBefore('#info')
                .delay(3000)
                .fadeOut(function() {
                  $(this).remove(); 
                });
            });
        } else if(status == "danger") {
            $(function() {
                $('<div class = "alert alert-danger" ><strong>Danger!</strong>'+text+'</div>')
                .insertBefore('#info')
                .delay(3000)
                .fadeOut(function() {
                    $(this).remove(); 
                });
            });
        }
    }
    //End Create Map

    //Log User
    $(document).on("click","#menuLogUser",function(){
        $.ajax({
            url: 'LogUser/logUser.php',
            dataType:'json',
            type: 'post',
            data: { logUser: true },  // data to submit
            success: function (data, status) {
                $("#display").html(data)
                $(document).find("#nameRoute").html('ROUTE 1')
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    })
    $(document).on("click",".menu-log",function(){
        console.log($(this).attr("id"))
        $(document).find("#nameRoute").html('ROUTE '+$(this).attr("id"))
        $.ajax({
            url: 'LogUser/logUser.php',
            dataType:'json',
            type: 'post',
            data: { route: $(this).attr("id") },  // data to submit
            success: function (data, status) {
                $(document).find("#bgMap").html(data.maps)
                $(document).find("#Tmaps").html(data.Tmaps)
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    })
    $(document).on("click",".detailPoint",function(){
        $.ajax({
            url: 'LogUser/logUser.php',
            dataType:'json',
            type: 'post',
            data: { datailPoint: true, uuid: $(this).attr("val") },  // data to submit
            success: function (data, status) {
                $(document).find("#modalLoguser").html(data)
                $('#tableUserDetail').DataTable();
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    }) 
    $(document).on("click",".pic-card",function(){
        $(document).find("#picCard").attr("src","pic_cards/"+$(this).attr("val"))
    })  
    $(document).on("click",".close-pic-modal",function(){
        $(document).find(".pic-modal").modal('toggle');
    })  

    //manageMap
    function getMaps(){
        $.ajax({
            url: 'ManageMap/manageMap.php',
            dataType:'json',
            type: 'post',
            data: { getData: true },  // data to submit
            success: function (data, status) {
                $("#display").html(data)
                $('#tableMaps').DataTable();
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    }
    $(document).on("click","#menuManageMap",function(){
        getMaps()
    })
    $(document).on("click",".mapsEdit",function(){
        $.ajax({
            url: 'ManageMap/manageMap.php',
            dataType:'json',
            type: 'post',
            data: { getDetail: true, uuid:$(this).attr("id")},  // data to submit
            success: function (data, status) {
                console.log(data)
                $(document).find("#uuidEdit").val(data.uuid);
                $(document).find("#xEdit").val(data.x);
                $(document).find("#yEdit").val(data.y);
                $(document).find("#nameEdit").val(data.name);
                $(document).find("#routeEdit").val(data.route);
                $(document).find("#statusEdit").val(data.map_status);
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    })
    $(document).on("click","#submitEditMaps",function(){
        $.ajax({
            url: 'ManageMap/manageMap.php',
            dataType:'json',
            type: 'post',
            data: { 
                editMaps: true, 
                uuid: $(document).find("#uuidEdit").val(),
                x: $(document).find("#xEdit").val(),
                y: $(document).find("#yEdit").val(),
                name: $(document).find("#nameEdit").val(),
                route: $(document).find("#routeEdit").val(),
                status: $(document).find("#statusEdit").val(),
            },  // data to submit
            success: function (data, status) {
                console.log(data)
                if(data){
                    info("success","Edit Success")
                } else {
                    info("danger","Edit Fail")
                }
                getMaps()
                $(document).find(".mapsEdit-modal").modal('toggle');
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    })
    $(document).on("click","#submitInsertMaps",function(){
        $.ajax({
            url: 'ManageMap/manageMap.php',
            dataType:'json',
            type: 'post',
            data: { 
                insertMaps: true, 
                uuid: $(document).find("#uuidInsert").val(),
                x: $(document).find("#xInsert").val(),
                y: $(document).find("#yInsert").val(),
                name: $(document).find("#nameInsert").val(),
                route: $(document).find("#routeInsert").val(),
                status: $(document).find("#statusInsert").val(),
            },  // data to submit
            success: function (data, status) {
                console.log(data)
                if(data){
                    info("success","Insert Success")
                } else {
                    info("danger","Insert Fail")
                }
                getMaps()
                $(document).find(".mapsInsert-modal").modal('toggle');
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    })
    $(document).on("click",".submitDeleteMaps",function(){
        $.ajax({
            url: 'ManageMap/manageMap.php',
            dataType:'json',
            type: 'post',
            data: { 
                deleteMaps: true, 
                uuid: $(this).attr("id"),
            },  // data to submit
            success: function (data, status) {
                console.log(data)
                if(data){
                    info("success","Delete Success")
                } else {
                    info("danger","Delete Fail")
                }
                getMaps()
            },
            error: function ( errorMessage) {
                console.dir('Error' + errorMessage);
            }
        })
    })

})
<!doctype html>
<html>
    <head>
        <title>Socket.IO</title>
    </head>
    <body>
        <h3>Clock</h3>
        <div id="date"></div>
        <h3>CPU</h3>
        <div id="cpu"></div>
        <h3>Memory</h3>
        <div id="memory"></div>
        <h3>Disk</h3>
        <div id="disk"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
        <script>
            var socket = io.connect('http://localhost:3000');
            socket.on('connect',function(data) {
                console.log(data)
                socket.emit('join','Hello world from client');
            });
            socket.on('clock',function(data){
                // console.log(data)
            })
        </script>
</body>
</html>
var express = require('express'),
    app = express(),
    server = require('http').Server(app),
    io = require('socket.io')(server),
    port = 8888;

//Server start
server.listen(port)

//user server
app.use(express.static(__dirname + '/public'));

io.on('connection', onConnection);

var connectedSocket = null;
function onConnection(socket){
    connectedSocket = socket;
}

//Arduino to CMD
const SerialPort = require('serialport');
const Readline = SerialPort.parsers.Readline; 
const usbport = new SerialPort('COM3');  
const parser = usbport.pipe(new Readline()); 
parser.on('data', function (data) {
    console.log(data)
    io.emit('data', { data: data });
});
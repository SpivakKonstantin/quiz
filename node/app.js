var app = require('http').createServer(handler)
    , io = require('socket.io').listen(app);

app.listen(3000);
function handler (req, res) {}

io.sockets.on('connection', function (socket) {
    console.log('connection user')

    socket.on('tonode', function (data) {
        console.log(data);
        socket.broadcast.emit('fromnode', data);
    });
});
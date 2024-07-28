// server.js
const express = require('express');
const axios = require('axios');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const ALPHA_VANTAGE_API_KEY = 'VEWSZ1LN7ZW1AQUQ';

io.on('connection', (socket) => {
    console.log('New client connected');
    socket.on('disconnect', () => {
        console.log('Client disconnected');
    });
});

setInterval(async () => {
    try {
        const response = await axios.get(`https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=AAPL&interval=1min&apikey=${ALPHA_VANTAGE_API_KEY}`);
        io.sockets.emit('FromAPI', response.data);
    } catch (error) {
        console.error(`Error: ${error}`);
    }
}, 60000);

server.listen(port, () => console.log(`Listening on port ${port}`));

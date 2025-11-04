const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const mysql = require('mysql2');
const bodyParser = require('body-parser');

// Initialize Express and Socket.io
const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', // Replace with your DB username
    password: '', // Replace with your DB password
    database: 'booking_system'
});

// Middleware
app.use(bodyParser.json());
app.use(express.static('public'));

// Socket.io setup to send real-time updates
io.on('connection', (socket) => {
    console.log('A user connected');
    socket.on('disconnect', () => {
        console.log('A user disconnected');
    });
});

// API to get room prices
app.get('/api/room-prices', (req, res) => {
    db.query('SELECT * FROM room_prices', (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.json(results);
        }
    });
});

// API to submit a booking
app.post('/api/book-room', (req, res) => {
    const { name, email, phone, room_type, booking_date, hall_booking } = req.body;
    const query = `INSERT INTO users (name, email, phone, room_type, booking_date, hall_booking) 
                   VALUES (?, ?, ?, ?, ?, ?)`;

    db.query(query, [name, email, phone, room_type, booking_date, hall_booking], (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            // Emit real-time update
            io.emit('newBooking', { name, room_type, booking_date });
            res.status(200).send('Booking successful');
        }
    });
});

// Start server
server.listen(3000, () => {
    console.log('Server is running on http://localhost:3000');
});

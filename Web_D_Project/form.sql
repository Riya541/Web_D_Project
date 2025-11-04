CREATE DATABASE IF NOT EXISTS room_booking;

USE room_booking;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    contact VARCHAR(15),
    persons INT,
    room_type VARCHAR(50),
    price INT,
    date DATE
);

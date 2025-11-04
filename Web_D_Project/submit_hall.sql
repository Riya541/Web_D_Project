CREATE DATABASE IF NOT EXISTS hall_booking_db;

USE hall_booking_db;

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    contact VARCHAR(15),
    persons INT,
    hall_type VARCHAR(50),
    price VARCHAR(50),
    date DATE
);

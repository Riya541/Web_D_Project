<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'hotel_booking';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$number_of_persons = $_POST['number_of_persons'];
$hall_type = $_POST['hall_type'];
$price = $_POST['price'];
$booking_date = $_POST['booking_date'];

$sql = "INSERT INTO hall_bookings (name, contact_number, email, number_of_persons, hall_type, price, booking_date)
        VALUES ('$name', '$contact_number', '$email', '$number_of_persons', '$hall_type', '$price', '$booking_date')";

if ($conn->query($sql) === TRUE) {
    echo "Hall booking successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

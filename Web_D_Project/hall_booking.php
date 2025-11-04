<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "hall_booking_db"; // Make sure this DB exists in phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Safely access POST data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$contact = $_POST['contact'] ?? '';
$persons = $_POST['persons'] ?? 0;
$hall_type = $_POST['hall_type'] ?? '';
$price = $_POST['price'] ?? '';
$date = $_POST['date'] ?? '';

// Optional fields (if needed)
$phone = $_POST['phone'] ?? '';
$time = $_POST['time'] ?? '';
$message = $_POST['message'] ?? '';

// Basic validation
if (empty($name) || empty($email) || empty($contact) || empty($hall_type) || empty($price) || empty($date) || $persons < 1) {
  echo "Please fill all required fields correctly.";
  exit();
}

$sql = "INSERT INTO bookings (name, email, contact, persons, hall_type, price, date)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssisss", $name, $email, $contact, $persons, $hall_type, $price, $date);

if ($stmt->execute()) {
  echo "<h2>Booking Successful!</h2><p>Thank you, $name, your hall has been booked.</p>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
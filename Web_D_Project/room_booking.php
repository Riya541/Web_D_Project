<?php
$host = 'localhost';
$db = 'room_booking';
$user = 'root'; // Change if needed
$pass = '';     // Change if needed

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $persons = (int) $_POST['persons'];
    $room_type = $conn->real_escape_string($_POST['room_type']);
    $price = (float) $_POST['price'];
    $date = $conn->real_escape_string($_POST['date']);

    $sql = "INSERT INTO bookings (name, email, contact, persons, room_type, price, date)
            VALUES ('$name', '$email', '$contact', $persons, '$room_type', $price, '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>

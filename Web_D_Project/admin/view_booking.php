<?php
require_once '../config.php';

// Check if admin is logged in (you should implement proper authentication)
// session_start();
// if(!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     exit();
// }

$sql = "SELECT * FROM bookings ORDER BY date DESC, time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>All Bookings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>Service</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= substr($row['time'], 0, 5) ?></td>
            <td><?= htmlspecialchars($row['service']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
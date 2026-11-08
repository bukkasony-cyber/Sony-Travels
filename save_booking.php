<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $pickup = trim($_POST['pickup']);
    $destination = trim($_POST['destination']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $car = $_POST['car'];
    $passengers = (int) $_POST['passengers'];
    $trip = $_POST['trip'];

    $sql = "INSERT INTO bookings
    (customer_name, email, phone, car_name, pickup_location,
    drop_location, pickup_date, pickup_time, passengers, trip_type)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Query error: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssssis",
        $name,
        $email,
        $phone,
        $car,
        $pickup,
        $destination,
        $date,
        $time,
        $passengers,
        $trip
    );

    if ($stmt->execute()) {
        echo "<h1>Booking Successful!</h1>";
        echo "<h3>Thank you for choosing Sony Travels!</h3>";
        echo "<p>Customer Name: " . htmlspecialchars($name) . "</p>";
        echo "<p>Selected Car: " . htmlspecialchars($car) . "</p>";
        echo "<p>Pickup Date: " . htmlspecialchars($date) . "</p>";
        echo "<a href='index.html'>Go to Home</a>";
    } else {
        echo "Booking failed: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Invalid request.";
}
?>
<?php
<<<<<<< HEAD
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_pielago_im";

// Create connection
$connection = new mysqli($servername, $username, "", $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
=======
session_start();

// Database connection info
$host = 'localhost';
$db   = 'docc_call_db';
$user = 'root';
$pass = '';

// Create the connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// SQL query
$sql = "SELECT * FROM appointment WHERE patient_id = ?";

// Prepare the statement
$stmt = $mysqli->prepare($sql);

// Check if prepare was successful
if (!$stmt) {
    die('Prepare failed: ' . $mysqli->error);
}

// Bind the parameter (assuming you want appointments for the logged-in patient)
$stmt->bind_param("i", $_SESSION['user_id']);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the result is valid
if ($result) {
    // Fetch and display the data
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
        // Display the appointment information (for example)
        echo "Appointment ID: " . $row['appointmentID'] . "<br>";
        echo "Date: " . $row['appointment_date'] . "<br>";
        echo "Time: " . $row['appointment_time'] . "<br>";
        echo "Status: " . $row['status'] . "<br><br>";
    }
} else {
    echo "Error: " . $mysqli->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
>>>>>>> libron
?>

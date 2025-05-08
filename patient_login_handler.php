<?php
session_start();

// DB connection info
$host = 'localhost';
$db   = 'docc_call_db';
$user = 'root';
<<<<<<< HEAD
$pass = 'root';
=======
$pass = "";
>>>>>>> libron

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Sanitize input function to prevent XSS
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
<<<<<<< HEAD
    $email = sanitize_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
=======
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
>>>>>>> libron

    // Check if the email and password are empty
    if (empty($email) || empty($password)) {
        http_response_code(400);
        echo json_encode(['error' => 'Please enter both email and password.']);
        exit;
    }

    // Prepare and execute the query to get the user by email, including role
    $stmt = $conn->prepare("SELECT user_id, first_name, last_name, password_hash, role FROM users WHERE email = ?");
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Query preparation failed: ' . $conn->error]);
        exit;
    }

    // Bind the email parameter to the prepared statement
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists and verify the password
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check if the user role is "patient"
        if ($user['role'] !== 'patient') {
            http_response_code(403);
            echo json_encode(['error' => 'You do not have access to this resource.']);
            exit;
        }

        // Verify the entered password against the stored hashed password
        if (password_verify($password, $user['password_hash'])) {
            // Store user session data if login is successful
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
<<<<<<< HEAD
=======
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];  // Store the user's role


            // Redirect to the appointment_patient.php page
            header("Location: appointment_patient.php");
            exit;  // Ensure no further code is executed after redirection
>>>>>>> libron

            // Send success response
            echo json_encode(['success' => true, 'message' => 'Login successful.']);
        } else {
            // Invalid password
            http_response_code(401);
            echo json_encode(['error' => 'Invalid password.']);
        }
    } else {
        // User not found
        http_response_code(404);
        echo json_encode(['error' => 'User not found.']);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method.']);
}

<?php
// Database credentials
$host = 'localhost';
$db   = 'docc_call_db';
$user = 'root';
$pass = 'root';

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Set response header
header('Content-Type: text/html');



// Check for required fields
$requiredFields = ['email', 'password', 'firstName', 'lastName', 'gender', 'dob', 'phone'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo "Error: Field '$field' is required.";
        exit;
    }
}

// Sanitize and assign variables
$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];
$firstName = $conn->real_escape_string($_POST['firstName']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$gender = $conn->real_escape_string($_POST['gender']);
$dob = $conn->real_escape_string($_POST['dob']);
$phone = $conn->real_escape_string($_POST['phone']);
$emergency_contact=$conn->real_escape_string($_POST['emer_phone']);
$medicalHistory = isset($_POST['medicalHistory']) ? $conn->real_escape_string($_POST['medicalHistory']) : '';



// Hash the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Check if email already exists
$checkEmailStmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
$checkEmailStmt->bind_param("s", $email);
$checkEmailStmt->execute();
$checkEmailStmt->store_result();
if ($checkEmailStmt->num_rows > 0) {
    http_response_code(409);
    echo json_encode(['error' => 'Email already registered']);
    $checkEmailStmt->close();
    $conn->close();
    exit;
}
$checkEmailStmt->close();

// Insert into users table
$role = 'patient';
$userStmt = $conn->prepare("
    INSERT INTO users (first_name, last_name, birthdate, contact_num, email, password_hash, role) 
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$userStmt->bind_param("sssssss", 
    $firstName,
    $lastName, 
    $dob,
    $phone,
    $email,
    $hashedPassword, 
    $role
);


if ($userStmt->execute()) {
    $userId = $userStmt->insert_id;

    // Insert into patients table
    $patientStmt = $conn->prepare("
        INSERT INTO patients (patient_id,emergency_contact, medical_history)
        VALUES (?, ?, ?)
    ");
    $patientStmt->bind_param(
        "iss",
        $userId,
        $emergency_contact,
        $medicalHistory
        
    );

    if ($patientStmt->execute()) {
        echo json_encode(['message' => 'Registration successful']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to save patient data']);
    }

    $patientStmt->close();
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create user']);
}

$userStmt->close();
$conn->close();
?>

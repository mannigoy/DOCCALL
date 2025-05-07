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

// Required fields
$requiredFields = ['email', 'password', 'firstName', 'lastName', 'gender', 'dob', 'phone', 'licence_number', 'department', 'specialization'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo "Error: Field '$field' is required.";
        exit;
    }
}

// Sanitize inputs
$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];
$firstName = $conn->real_escape_string($_POST['firstName']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$gender = $conn->real_escape_string($_POST['gender']);
$dob = $conn->real_escape_string($_POST['dob']);
$phone = $conn->real_escape_string($_POST['phone']);
$licenceNumber = $conn->real_escape_string($_POST['licence_number']);
$department = $conn->real_escape_string($_POST['department']);
$specialization = $conn->real_escape_string($_POST['specialization']);
$consultationFee = 450; 

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

// User insert (DO NOT MODIFY DOCTOR NA NI)
$role = 'doctor';
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

// Execute user insert
if ($userStmt->execute()) {
    $userId = $userStmt->insert_id;

    // Insert into doctors table
    $doctorStmt = $conn->prepare("
        INSERT INTO doctors (doctor_id, licence_number, department, specialization, consultation_fee)
        VALUES (?, ?, ?, ?, ?)
    ");
    $doctorStmt->bind_param(
        "isssd",
        $userId,
        $licenceNumber,
        $department,
        $specialization,
        $consultationFee
    );

    if ($doctorStmt->execute()) {
        echo json_encode(['message' => 'Doctor registration successful']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to save doctor data']);
    }

    $doctorStmt->close();
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create user']);
}

$userStmt->close();
$conn->close();
?>

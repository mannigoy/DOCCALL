<?php
session_start();

// Check if user is logged in and is a patient
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header("Location: login_pat_new.php");
    exit();
}

// DB connection info
$host = 'localhost';
$db   = 'docc_call_db';
$user = 'root';
$pass = "";

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get patient ID from session
$patient_id = $_SESSION['user_id'];

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                // Add new appointment
                $doctor_id = sanitize_input($_POST['doctor_id']);
                $date = sanitize_input($_POST['date']);
                $time = sanitize_input($_POST['time']);
                $reason = sanitize_input($_POST['reason']);
                
                $stmt = $conn->prepare("INSERT INTO appointment (appointment_date, appointment_time, status, doctor_id, patient_id, reason) 
                                      VALUES (?, ?, 'pending', ?, ?, ?)");

                if ($stmt === false) {
                    die('Error preparing statement: ' . $conn->error);
                }

                $stmt->bind_param("ssiis", $date, $time, $doctor_id, $patient_id, $reason);
                $stmt->execute();
                $stmt->close();
                
                $_SESSION['message'] = "Appointment requested successfully!";
                header("Location: appointment_patient.php");
                exit();
                break;
            
            case 'cancel':
                // Cancel appointment
                $appointment_id = sanitize_input($_POST['appointment_id']);
                
                $stmt = $conn->prepare("UPDATE appointment SET status = 'cancelled' WHERE appointmentID = ? AND patient_id = ?");
                $stmt->bind_param("ii", $appointment_id, $patient_id);
                $stmt->execute();
                $stmt->close();
                
                $_SESSION['message'] = "Appointment cancelled successfully!";
                header("Location: appointment_patient.php");
                exit();
                break;
            
            case 'update':
                // Update appointment reason or reschedule
                $appointment_id = sanitize_input($_POST['appointment_id']);
                $reason = sanitize_input($_POST['reason']);
                $date = isset($_POST['date']) ? sanitize_input($_POST['date']) : null;
                $time = isset($_POST['time']) ? sanitize_input($_POST['time']) : null;
                
                if ($date && $time) {
                    // Rescheduling - set status back to pending if it was approved
                    $stmt = $conn->prepare("UPDATE appointment SET reason = ?, appointment_date = ?, appointment_time = ?, 
                                          status = IF(status = 'approved', 'pending', status) 
                                          WHERE appointmentID = ? AND patient_id = ?");
                    $stmt->bind_param("sssii", $reason, $date, $time, $appointment_id, $patient_id);
                } else {
                    // Just updating reason
                    $stmt = $conn->prepare("UPDATE appointment SET reason = ? WHERE appointmentID = ? AND patient_id = ?");
                    $stmt->bind_param("sii", $reason, $appointment_id, $patient_id);
                }
                
                $stmt->execute();
                $stmt->close();
                
                $_SESSION['message'] = "Appointment updated successfully!";
                header("Location: appointment_patient.php");
                exit();
                break;
        }
    }
}

// Get all doctors (for search functionality)
$doctors = [];
$search_term = isset($_GET['search']) ? sanitize_input($_GET['search']) : '';
$doctor_query = "SELECT u.user_id, u.first_name, u.last_name, d.specialization 
                FROM users u 
                JOIN doctors d ON u.user_id = d.doctor_id 
                WHERE u.role = 'doctor'";

if (!empty($search_term)) {
    $doctor_query .= " AND (u.first_name LIKE '%$search_term%' OR u.last_name LIKE '%$search_term%' OR d.specialization LIKE '%$search_term%')";
}

$result = $conn->query($doctor_query);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $doctors[] = [
            'id' => $row['user_id'],
            'name' => $row['first_name'] . ' ' . $row['last_name'],
            'specialty' => $row['specialization'],
            'image' => 'https://images.pexels.com/photos/5327585/pexels-photo-5327585.jpeg'
        ];
    }
    $result->free();
}

// Get current date and time
$current_date = date('F j, Y | l');
$today_date = date('Y-m-d');

// Get patient's appointments
$all_appointments = [];
$result = $conn->query("SELECT a.appointmentID, a.appointment_date as date, a.appointment_time as time, 
                        a.status, a.reason, 
                        u.first_name, u.last_name, d.specialization
                        FROM appointment a
                        JOIN users u ON a.doctor_id = u.user_id
                        JOIN doctors d ON u.user_id = d.doctor_id
                        WHERE a.patient_id = $patient_id
                        ORDER BY a.appointment_date DESC, a.appointment_time DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $all_appointments[] = [
            'id' => $row['appointmentID'],
            'patientName' => $_SESSION['first_name'] . ' ' . $_SESSION['last_name'],
            'doctorName' => $row['first_name'] . ' ' . $row['last_name'],
            'specialty' => $row['specialization'],
            'date' => $row['date'],
            'time' => $row['time'],
            'reason' => $row['reason'],
            'status' => $row['status']
        ];
    }
    $result->free();
}

// Filter appointments by status
$today_appointments = array_filter($all_appointments, function($app) use ($today_date) {
    return $app['date'] == $today_date && $app['status'] != 'cancelled' && $app['status'] != 'completed';
});

$pending_appointments = array_filter($all_appointments, function($app) {
    return $app['status'] == 'pending';
});

$approved_appointments = array_filter($all_appointments, function($app) {
    return $app['status'] == 'approved';
});

$completed_appointments = array_filter($all_appointments, function($app) {
    return $app['status'] == 'completed';
});

$cancelled_appointments = array_filter($all_appointments, function($app) {
    return $app['status'] == 'cancelled';
});

$page = isset($_GET['page']) ? sanitize_input($_GET['page']) : 'dashboard';
$tab = isset($_GET['tab']) ? sanitize_input($_GET['tab']) : 'today';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCCALL - Medical Appointment System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        },
                        secondary: {
                            500: '#6366f1'
                        },
                        success: {
                            500: '#10b981'
                        },
                        warning: {
                            500: '#f59e0b'
                        },
                        danger: {
                            500: '#ef4444'
                        },
                        info: {
                            500: '#06b6d4'
                        },
                        dark: {
                            500: '#64748b',
                            700: '#334155',
                            900: '#0f172a'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .tab-active {
            position: relative;
            color: #3b82f6;
            font-weight: 500;
        }
        .tab-active:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #3b82f6;
            border-radius: 2px;
        }
        .status-badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .status-completed {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        .status-denied {
            background-color: #f3e8ff;
            color: #6b21a8;
        }
        .doctor-card.selected {
            border-color: #3b82f6;
            background-color: #f0f9ff;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-20">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <a href="appointment_patient.php" class="flex items-center space-x-2 text-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                    </svg>
                    <span class="text-2xl font-bold">DOCCALL</span>
                </a>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                            <?= strtoupper(substr($_SESSION['first_name'], 0, 1)) ?>
                        </div>
                        <span class="text-sm text-dark-700"><?= htmlspecialchars($_SESSION['first_name']) ?></span>
                    </div>
                    <a href="new_home.php" class="text-sm text-danger-500 hover:text-danger-700">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <?php if ($message): ?>
            <div class="card p-4 mb-6 bg-success-50 border border-success-200 animate-fade-in">
                <div class="flex items-center text-success-700">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span><?= htmlspecialchars($message) ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-dark-900">Appointment Management</h1>
                <p class="text-dark-500 mt-1">
                    <i class="far fa-calendar-alt mr-1"></i> <?= $current_date ?>
                </p>
            </div>
            <?php if ($page === 'dashboard'): ?>
                <a href="?page=request" class="mt-4 md:mt-0 inline-flex items-center bg-primary-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-primary-600 transition-colors">
                    <i class="fas fa-plus-circle mr-2"></i> New Appointment
                </a>
            <?php endif; ?>
        </div>

        <?php if ($page === 'dashboard'): ?>
            <!-- Tabs Navigation -->
            <div class="border-b border-gray-200 mb-8">
                <nav class="-mb-px flex space-x-8 overflow-x-auto pb-1">
                    <a href="?page=dashboard&tab=today" 
                       class="<?= $tab === 'today' ? 'tab-active' : 'text-dark-500 hover:text-primary-500' ?> whitespace-nowrap py-3 px-1 font-medium text-sm">
                        <i class="far fa-clock mr-1"></i> Today (<?= count($today_appointments) ?>)
                    </a>
                    <a href="?page=dashboard&tab=all" 
                       class="<?= $tab === 'all' ? 'tab-active' : 'text-dark-500 hover:text-primary-500' ?> whitespace-nowrap py-3 px-1 font-medium text-sm">
                        <i class="fas fa-list-ul mr-1"></i> All (<?= count($all_appointments) ?>)
                    </a>
                    <a href="?page=dashboard&tab=pending" 
                       class="<?= $tab === 'pending' ? 'tab-active' : 'text-dark-500 hover:text-primary-500' ?> whitespace-nowrap py-3 px-1 font-medium text-sm">
                        <i class="far fa-hourglass mr-1"></i> Pending (<?= count($pending_appointments) ?>)
                    </a>
                    <a href="?page=dashboard&tab=approved" 
                       class="<?= $tab === 'approved' ? 'tab-active' : 'text-dark-500 hover:text-primary-500' ?> whitespace-nowrap py-3 px-1 font-medium text-sm">
                        <i class="far fa-check-circle mr-1"></i> Approved (<?= count($approved_appointments) ?>)
                    </a>
                    <a href="?page=dashboard&tab=completed" 
                       class="<?= $tab === 'completed' ? 'tab-active' : 'text-dark-500 hover:text-primary-500' ?> whitespace-nowrap py-3 px-1 font-medium text-sm">
                        <i class="fas fa-check-double mr-1"></i> Completed (<?= count($completed_appointments) ?>)
                    </a>
                    <a href="?page=dashboard&tab=cancelled" 
                       class="<?= $tab === 'cancelled' ? 'tab-active' : 'text-dark-500 hover:text-primary-500' ?> whitespace-nowrap py-3 px-1 font-medium text-sm">
                        <i class="far fa-times-circle mr-1"></i> Cancelled (<?= count($cancelled_appointments) ?>)
                    </a>
                </nav>
            </div>

            <!-- Appointment Table -->
            <div class="card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-dark-500 uppercase tracking-wider">Date & Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-dark-500 uppercase tracking-wider">Doctor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-dark-500 uppercase tracking-wider">Reason</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-dark-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-dark-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php 
                            // Determine which appointments to display based on active tab
                            $display_appointments = [];
                            switch($tab) {
                                case 'today': $display_appointments = $today_appointments; break;
                                case 'all': $display_appointments = $all_appointments; break;
                                case 'pending': $display_appointments = $pending_appointments; break;
                                case 'approved': $display_appointments = $approved_appointments; break;
                                case 'completed': $display_appointments = $completed_appointments; break;
                                case 'cancelled': $display_appointments = $cancelled_appointments; break;
                                default: $display_appointments = $today_appointments;
                            }
                            
                            if (empty($display_appointments)): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-dark-500">
                                        <i class="far fa-calendar-times text-3xl mb-2 text-gray-300"></i>
                                        <p class="text-sm">No appointments found in this category</p>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($display_appointments as $appointment): 
                                    $date = new DateTime($appointment['date']);
                                    $is_past = $date < new DateTime('today');
                                ?>
                                    <tr class="<?= $is_past ? 'bg-gray-50' : 'hover:bg-gray-50' ?>">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium <?= $is_past ? 'text-dark-400' : 'text-dark-900' ?>">
                                                <?= $date->format('M j, Y') ?>
                                            </div>
                                            <div class="text-sm <?= $is_past ? 'text-dark-300' : 'text-dark-500' ?>">
                                                <?= htmlspecialchars($appointment['time']) ?> 
                                                (<?= intval(explode(':', $appointment['time'])[0]) >= 12 ? 'PM' : 'AM' ?>)
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                                                    <?= strtoupper(substr($appointment['doctorName'], 0, 1)) ?>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium <?= $is_past ? 'text-dark-400' : 'text-dark-900' ?>">
                                                        <?= htmlspecialchars($appointment['doctorName']) ?>
                                                    </div>
                                                    <div class="text-sm <?= $is_past ? 'text-dark-300' : 'text-dark-500' ?>">
                                                        <?= htmlspecialchars($appointment['specialty']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm <?= $is_past ? 'text-dark-400' : 'text-dark-700' ?> max-w-xs truncate">
                                                <?= htmlspecialchars($appointment['reason']) ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php 
                                            $status_class = '';
                                            switch($appointment['status']) {
                                                case 'pending': $status_class = 'status-pending'; break;
                                                case 'approved': $status_class = 'status-approved'; break;
                                                case 'denied': $status_class = 'status-denied'; break;
                                                case 'cancelled': $status_class = 'status-cancelled'; break;
                                                case 'completed': $status_class = 'status-completed'; break;
                                                default: $status_class = 'status-pending';
                                            }
                                            ?>
                                            <span class="status-badge <?= $status_class ?>">
                                                <?= ucfirst(htmlspecialchars($appointment['status'])) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <?php if ($appointment['status'] !== 'cancelled' && $appointment['status'] !== 'completed' && $appointment['status'] !== 'denied'): ?>
                                                <div class="flex justify-end space-x-3">
                                                    <button onclick="showEditModal(
                                                        <?= $appointment['id'] ?>, 
                                                        '<?= htmlspecialchars($appointment['reason']) ?>',
                                                        '<?= $appointment['date'] ?>',
                                                        '<?= $appointment['time'] ?>'
                                                    )" class="text-primary-600 hover:text-primary-900">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form method="POST" class="inline">
                                                        <input type="hidden" name="action" value="cancel">
                                                        <input type="hidden" name="appointment_id" value="<?= $appointment['id'] ?>">
                                                        <button type="submit" class="text-danger-600 hover:text-danger-900">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php elseif ($page === 'request'): ?>
            <!-- Request Appointment Form -->
            <div class="max-w-3xl mx-auto animate-fade-in">
                <div class="card p-6 mb-6">
                    <h1 class="text-2xl font-bold text-dark-900 flex items-center">
                        <i class="fas fa-calendar-plus text-primary-500 mr-2"></i> Request New Appointment
                    </h1>
                    <p class="text-dark-500 mt-1">Fill out the form below to schedule an appointment</p>
                </div>
                
                <div class="card p-6">
                    <form method="POST" class="space-y-6">
                        <input type="hidden" name="action" value="add">
                        
                        <!-- Doctor Search -->
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-2">
                                <i class="fas fa-search mr-1 text-primary-500"></i> Search for a Doctor
                            </label>
                            <div class="relative">
                                <input type="text" id="doctorSearch" placeholder="Search by name or specialty..." 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <div class="absolute right-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Doctor Selection Grid -->
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-2">Select a Doctor</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="doctorGrid">
                                <?php foreach ($doctors as $doctor): ?>
                                    <label class="doctor-card border rounded-lg p-4 cursor-pointer transition-all hover:border-primary-300">
                                        <input type="radio" name="doctor_id" value="<?= $doctor['id'] ?>" class="hidden" required>
                                        <div class="flex items-center">
                                            <img src="<?= htmlspecialchars($doctor['image']) ?>" 
                                                 alt="<?= htmlspecialchars($doctor['name']) ?>" 
                                                 class="w-12 h-12 rounded-full object-cover">
                                            <div class="ml-4">
                                                <h3 class="font-medium text-dark-900"><?= htmlspecialchars($doctor['name']) ?></h3>
                                                <p class="text-sm text-dark-500"><?= htmlspecialchars($doctor['specialty']) ?></p>
                                            </div>
                                        </div>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <!-- Date and Time -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-dark-700 mb-2">
                                    <i class="far fa-calendar-alt mr-1 text-primary-500"></i> Date
                                </label>
                                <input type="date" name="date" required
                                       min="<?= date('Y-m-d') ?>"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-dark-700 mb-2">
                                    <i class="far fa-clock mr-1 text-primary-500"></i> Time
                                </label>
                                <select name="time" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    <option value="">Select a time</option>
                                    <?php
                                    $times = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
                                             '13:00', '13:30', '14:00', '14:30', '15:00', '15:30'];
                                    foreach ($times as $time):
                                        $ampm = intval(explode(':', $time)[0]) >= 12 ? 'PM' : 'AM';
                                    ?>
                                        <option value="<?= $time ?>"><?= $time ?> (<?= $ampm ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Reason for Visit -->
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-2">
                                <i class="fas fa-comment-medical mr-1 text-primary-500"></i> Reason for Visit
                            </label>
                            <textarea name="reason" rows="4" required
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                      placeholder="Please briefly describe your symptoms or reason for the appointment"></textarea>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                            <a href="appointment_patient.php" class="px-4 py-2 border border-gray-300 rounded-lg text-dark-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-times mr-1"></i> Cancel
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors">
                                <i class="fas fa-paper-plane mr-1"></i> Request Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-30">
        <div class="bg-white rounded-xl max-w-md w-full p-6 animate-fade-in">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-dark-900">
                    <i class="fas fa-edit text-primary-500 mr-2"></i> Edit Appointment
                </h3>
                <button onclick="hideEditModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="appointment_id" id="editAppointmentId">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-dark-700 mb-1">Date</label>
                        <input type="date" name="date" id="editDate" required
                               min="<?= date('Y-m-d') ?>"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark-700 mb-1">Time</label>
                        <select name="time" id="editTime" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500">
                            <?php
                            $times = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
                                     '13:00', '13:30', '14:00', '14:30', '15:00', '15:30'];
                            foreach ($times as $time):
                                $ampm = intval(explode(':', $time)[0]) >= 12 ? 'PM' : 'AM';
                            ?>
                                <option value="<?= $time ?>"><?= $time ?> (<?= $ampm ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark-700 mb-1">Reason</label>
                    <textarea name="reason" id="editReason" rows="4" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500"></textarea>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" onclick="hideEditModal()"
                            class="px-4 py-2 border border-gray-300 rounded-md text-dark-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-primary-500 text-white rounded-md hover:bg-primary-600">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Edit Modal Functions
        function showEditModal(appointmentId, reason, date, time) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editAppointmentId').value = appointmentId;
            document.getElementById('editReason').value = reason;
            document.getElementById('editDate').value = date;
            document.getElementById('editTime').value = time;
        }

        function hideEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Doctor Search Functionality
        document.getElementById('doctorSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const doctorCards = document.querySelectorAll('#doctorGrid .doctor-card');
            
            doctorCards.forEach(card => {
                const doctorName = card.querySelector('h3').textContent.toLowerCase();
                const specialty = card.querySelector('p').textContent.toLowerCase();
                
                if (doctorName.includes(searchTerm) || specialty.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Doctor Selection Styling
        document.querySelectorAll('input[name="doctor_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.doctor-card').forEach(card => {
                    card.classList.remove('selected', 'border-primary-500', 'bg-primary-50', 'ring-2', 'ring-primary-200');
                });
                
                if (this.checked) {
                    this.parentElement.classList.add('selected', 'border-primary-500', 'bg-primary-50', 'ring-2', 'ring-primary-200');
                }
            });
        });

        // Initialize any selected doctor (for page refresh)
        document.querySelectorAll('input[name="doctor_id"]:checked').forEach(radio => {
            radio.parentElement.classList.add('selected', 'border-primary-500', 'bg-primary-50', 'ring-2', 'ring-primary-200');
        });
    </script>
</body>
</html>
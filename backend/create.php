<?php
// Your main PHP file

// Include the database connection file
//include 'dbConnection';
// Database connection
$db = new mysqli('localhost', 'root', '', 'hospitalmgtsystem');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already established a connection to the database
    $name = $_POST['PatientName'];
    $patient_dob = $_POST['  DateOfBirth'];
    $patient_address = $_POST['PatientAddress'];
    $patient_gender = $_POST['Gender'];

    // Insert patient data into the database
    $sql = "INSERT INTO patientdetails  (PatientName, DateOfBirth, PatientAddress,Gender) VALUES ('$name', '$patient_dob', '$patient_address', '$patient_gender')";
    mysqli_query($db, $sql);
}

// Fetch the last inserted patient data from the database
$sql = "SELECT * FROM patientdetails ORDER BY PatientId DESC LIMIT 1";
$result = mysqli_query($db, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['PatientName'];
    $patient_dob = $row['DateOfBirth'];
    $patient_address = $row['PatientAddress'];
    $patient_gender = $row['Gender'];
    $username = $row['UserName'];
   

    // Display patient card
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="javascript" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Patient Card</title>
  
    </head>
   
    <body>
    <!-- Navbar -->
    <div class="navbar">
        <ul class="nav nav-pills poppins-medium">
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Appointment</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Medical History</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Personal Details</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="./Hospital_login.php">Patient Login</a>
                <li class="nav-item">
                <a class="nav-link" href="./hospital_list.php">Hospital list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../backend/AddPatient.php">Create Card</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Patient_login.html">Patientusingscan Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li> 
          </ul>
    </div>
    <hr class="line">
    
    <div class="patient-card">
      <div class="logo-container">
        <img src="logo.jpg" alt="Logo" class="logo">
      </div>
      <div class="patient-info">
        <h2>' . $name . '</h2>
        <p>Date of Birth: ' . $patient_dob . '</p>
        <p>Address: ' . $patient_address . '</p>
        <p>Gender: ' . $patient_gender . '</p>
        <p>Username: ' . $username. '</p>
      </div>
    </div>
    <p class="message">Patient card created!</p>
    
    </body>
    </html>
    ';
} else {
    // No patient data found
    echo "No patient data found!";
}


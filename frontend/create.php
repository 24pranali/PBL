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
   

    // Display patient card
    echo '

    ';
} else {
    // No patient data found
    echo "No patient data found!";
}


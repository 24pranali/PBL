<?php
// backend.php

// Database connection
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname =  'hospitalmgtsystem';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// API endpoints
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get all patients
    if ($_GET['action'] === 'getPatients') {
        $sql = "SELECT * FROM patients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $patients = array();
            while ($row = $result->fetch_assoc()) {
                $patients[] = $row;
            }
            echo json_encode($patients);
        } else {
            echo json_encode(array());
        }
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add a new patient
    if ($_POST['action'] === 'addPatient') {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $history = $_POST['history'];

        $sql = "INSERT INTO patients (name, age, history) VALUES ('$name', '$age', '$history')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Update patient history
    parse_str(file_get_contents("php://input"), $_PUT);
    if ($_PUT['action'] === 'updateHistory') {
        $id = $_PUT['id'];
        $newHistory = $_PUT['newHistory'];

        $sql = "UPDATE patients SET history='$newHistory' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Delete a patient
    parse_str(file_get_contents("php://input"), $_DELETE);
    if ($_DELETE['action'] === 'deletePatient') {
        $id = $_DELETE['id'];

        $sql = "DELETE FROM patients WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$conn->close();
?>

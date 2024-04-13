

<?php
$servername = "127.0.0.1";
$username = "root";
$password = '';
$dbname = "hospitalmgtsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the patient data from the database
$sql = "SELECT ph.PatientId, pd.PatientName, ph.TransID, ph.Treatments, ph.diagnosis, ph.Prescription, ph.visit_date 
        FROM patienthistory ph
        INNER JOIN patientdetails pd ON ph.PatientId = pd.PatientId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead><tr><th>Patient ID</th><th>Patient Name</th><th>TransID</th><th>Treatments</th><th>Diagnosis</th><th>Prescription</th><th>Visit Date</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['PatientId'] . "</td>";
        echo "<td>" . $row['PatientName'] . "</td>";
        echo "<td>" . $row['TransID'] . "</td>";
        echo "<td>" . $row['Treatments'] . "</td>";
        echo "<td>" . $row['diagnosis'] . "</td>";
        echo "<td>" . $row['Prescription'] . "</td>";
        echo "<td>" . $row['visit_date'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No patient history found";
}

$conn->close();
?>

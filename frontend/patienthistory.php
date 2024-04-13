<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient History</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>

<h2>Patient History</h2>

<div id="patienthistorybackend"></div>

<script>
// Function to fetch patient history data from the backend PHP script
function fetchpatienthistorybackend() {
    fetch('../backend/patienthistorybackend.php') // Replace 'patienthistory.php' with your backend PHP script URL
    .then(response => response.text())
    .then(data => {
        document.getElementById('patienthistorybackend').innerHTML = data;
    })
    .catch(error => console.error('Error fetching patient history:', error));
}

// Call the fetchPatientHistory function when the page loads
document.addEventListener('DOMContentLoaded', fetchpatienthistorybackend);
</script>

</body>
</html>

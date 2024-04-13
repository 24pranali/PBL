<?php
$msg = "";

if(isset($_POST["submit"])) {
    $name = $_POST["name"];  
    // $email = $_POST["email"]; 
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $blood_group = $_POST["blood_group"];
    $contact_no = $_POST["contact_no"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $username = $_POST["username"];

    // Database connection
    $db = new mysqli('localhost', 'root', '', 'hospitalmgtsystem');
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($db, $name); 
    // $email = mysqli_real_escape_string($db, $email);
    $dob = mysqli_real_escape_string($db, $dob);
    $gender = mysqli_real_escape_string($db, $gender);
    $blood_group = mysqli_real_escape_string($db, $blood_group);
    $contact_no = mysqli_real_escape_string($db, $contact_no);
    $address = mysqli_real_escape_string($db, $address);
    $password = mysqli_real_escape_string($db, $password);
    $username = mysqli_real_escape_string($db, $username);

    // Check for empty fields
    if(empty($name) ||  empty($dob) || empty($gender) || empty($blood_group) || empty($contact_no) || empty($address) || empty($username)) {
        $msg = "<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
                <i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields marked with asterisk (*) </div>";
    } else {
        // Attempt to insert data into database
        $query = mysqli_query($db, "INSERT INTO patientdetails 
                    (PatientName, DateOfBirth, PatientAddress, Gender, ContactNo, UserName,Patient_Password, Blood_Group, Registration_Date)
                    VALUES ('$name', '$dob', '$address', '$gender', '$contact_no', '$username', '$password', '$blood_group', NOW())");

        if (!$query) {
            // If query fails, print error message
            printf("Error: %s\n", mysqli_error($db));
        } else {
            // If query succeeds, display success message
            $msg = "<div class='alert alert-block alert-success'>
            <button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
            <i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! You are now registered.</div>"; 
    // Redirect after successful form submission
            echo "<script>window.location.replace('./create.php');</script>";
          exit(); // Stop further execution
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="password"], select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="AddPatient.php" method="post" >
        <h2>Patient Registration Form</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <!-- <label for="email">Email:</label>
        <input type="email" id="email" name="email" required> -->
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        
        <label for="blood_group">Blood Group:</label>
        <input type="text" id="blood_group" name="blood_group" required>
        
        <label for="contact_no">Contact Number:</label>
        <input type="text" id="contact_no" name="contact_no" required>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Submit" name="submit" onclick="submit1()" >

    </form>

    <?php echo $msg; 
    ?>
</body>
<script>
   
    </script>

</html>
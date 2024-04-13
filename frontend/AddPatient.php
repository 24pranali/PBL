<?php
// Include the login logic file only if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'backend/AddPatient.php ';
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
    <form action="./backend/AddPatient.php" method="post">
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
        
        <input type="submit" value="Submit" name="submit">
    </form>

    
</body>
</html>

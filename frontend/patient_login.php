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


session_start();
//include 'dbConnection.php'; // Establishing connection with our database

$error = ""; //Variable for storing our errors.
	if(isset($_POST["signinBtn"]))
	{ 
	if(empty($_POST["Username"]) || empty($_POST["Password"]))
	{
	$error = "Both fields are required.";
	}
	else
		{
	// Define $username and $password
	$username=$_POST['UserName'];  
	$password=$_POST['Password'];
								
	// To protect from MySQL injection
	$username = stripslashes($Username);  
	$password = stripslashes($Password);
	$username = mysqli_real_escape_string($db, $username);
	$password = mysqli_real_escape_string($db, $password);
	$password = md5($password);
	//Check username and password from database
	$sql="SELECT UserName FROM patientdetails WHERE UserName='$username' and Password='$password'";   
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
								
	//echo $row['UserName']; exit;
	//If username and password exist in our database then create a session.
	//Otherwise echo error.
				
	if(mysqli_num_rows($result) == 1)
	{
	$_SESSION['login_user_id'] = $row['UserName'];   // Initializing Session
	header("l ../frontend/patient_login.php"); // Redirecting To Other Page
	//$error = "Logged.";
	}
	else
	{
	$error = "Incorrect username or password.";
	}
}


}

?>

<!DOCTYPE html>
<html lang="en">
<!-- {% load static %} -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital List</title>
    <link rel="stylesheet" href='login.css'>
    <script src="https://kit.fontawesome.com/b9e49e7386.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="head">
        <h1>Patient Login</h1>
    </div>
    <div class="container"> 
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form method="post" action=""> 
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="Usename" placeholder="UserName" id="UserName">
                    </div>

                   <!-- <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" id="">
                    </div>-->

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="Password" placeholder="Password" id="Password">
                    </div>
                    <p>Forgot password <a href="#">Click Here!</a></p>
                </div>
                <div class="btn-field">
                    <button type="button" id="signupBtn">Sign Up</button>
                    <button type="button" id="signinBtn" class="disable">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        let signinBtn = document.getElementById("signinBtn");

        signinBtn.addEventListener("click", function() {
            let username = document.getElementById("UserName").value;
            let password = document.getElementById("Password").value;

            if (username.trim() === "" || password.trim() === "") {
                alert("Both username and password are required.");
                return false; // Prevent form submission
            } else {
                // Form is valid, allow submission
                //document.querySelector("form").submit();
                window.location.replace("../frontend/patient_after_login.php");
            }
        });
    });
</script>

  
</body>
</html>

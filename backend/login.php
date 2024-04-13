<?php
session_start();
include 'dbConnection.php'; // Establishing connection with our database

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

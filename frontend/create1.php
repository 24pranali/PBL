<?php

include 
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Card</title>
    <style>
      /* CSS Styles */
      .patient-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        width: 80%; 
        max-width: 600px;
        
         
      }

      .logo-container {
        width: 120px; /* Adjust the width of the logo container */
        height: 100%;
      }

      .logo {
        width: 100%; /* Make the logo fill the logo container */
        border-radius: 8px; /* Rounded corners to match the card */
      }

      .patient-info {
        margin-left: 20px; /* Add space between the logo and patient information */
      }

      /* Additional styling for message */
      .message {
        font-style: italic;
        color: #007bff; /* Blue color for message */
      }
    </style>
    </head>
   
    <body>
    
    <div class="patient-card">
      <div class="logo-container">
        <img src="logo.jpg" alt="Logo" class="logo">
      </div>
      <div class="patient-info">
        <h2>' . $name . '</h2>
        <p>Date of Birth: ' . $patient_dob . '</p>
        <p>Address: ' . $patient_address . '</p>
        <p>Gender: ' . $patient_gender . '</p>
      </div>
    </div>
    <p class="message">Patient card created!</p>
    
    </body>
    </html>
   

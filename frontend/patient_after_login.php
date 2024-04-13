<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Health Card Dashboard</title>
    <!--<link rel="stylesheet" href="pal.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <link rel="javascript" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</title>
<style>
  .poppins-thin {
  font-family: "Poppins", sans-serif;
  font-weight: 100;
  font-style: normal;
}

.poppins-extralight {
  font-family: "Poppins", sans-serif;
  font-weight: 200;
  font-style: normal;
}

.poppins-light {
  font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
}

.poppins-regular {
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.poppins-medium {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: normal;
}

.poppins-semibold {
  font-family: "Poppins", sans-serif;
  font-weight: 600;
  font-style: normal;
}

.poppins-bold {
  font-family: "Poppins", sans-serif;
  font-weight: 700;
  font-style: normal;
}

.poppins-extrabold {
  font-family: "Poppins", sans-serif;
  font-weight: 800;
  font-style: normal;
}

.poppins-black {
  font-family: "Poppins", sans-serif;
  font-weight: 900;
  font-style: normal;
}

.poppins-thin-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 100;
  font-style: italic;
}

.poppins-extralight-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 200;
  font-style: italic;
}

.poppins-light-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: italic;
}

.poppins-regular-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-style: italic;
}

.poppins-medium-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: italic;
}

.poppins-semibold-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 600;
  font-style: italic;
}

.poppins-bold-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 700;
  font-style: italic;
}

.poppins-extrabold-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 800;
  font-style: italic;
}

.poppins-black-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 900;
  font-style: italic;
}

/* Navbar */

.navbar{
  max-width: 100%;
  max-height: 10%;
  /* background-color: rgb(248, 248, 154); */
  /* background-color: #D9EDBF; */
  
}
.line {
border: 0;
height: 1px;
background-color: black;
font-weight: bold;
margin-top: 10px; /* Adjust margin as needed */
}
.nav-item a{
color: black;
}
header{
text-align: center;
}
.profile-photo {
text-align: center;
}
.profile-photo img {
width: 200px; /* Adjust size as needed */
height: 200px; /* Adjust size as needed */
border-radius: 80%; /* Ensures the photo appears as a circle */
margin-bottom: 40px;
}
.hero-img{
text-align: end;
}
.hero-img img{
width: 200px; /* Adjust size as needed */
height: 200px;
}
.benifits{
margin-top: 10px;
max-width: 100%;
max-height: 25%;
height: 350px;
/* background-color: rgb(0, 191, 255); */
}

.benifits-head{
margin-top: 20px;
margin-left: 43%;
}
.benifits-info{
margin-top: 20px;
display: flex;
justify-content: space-evenly;

}
.benifit-box{
max-width: 25%;
width: 3110.5px;
background-color:rgb(17, 134, 161);
height: 228.9px;
border-radius: 10px;
display: flex;
justify-content: center; /* Center horizontally */
align-items: center;
}

.benifit-box h3{
margin-top: 5px;
margin-left: 5px;
text-align: center;
color: white;
}

.benifit-box img{
margin-top: 10px;
margin-left: 10px;
}
.quote{
text-align: center;
}
.mun1{
text-align: left;
}
</style>
</head>
<body>
    
        <nav>
           
            <ul class="nav nav-pills poppins-medium">
           
              <li class="nav-item">
                  <a class="nav-link" href="./profile.php">Profile</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="./patienthistory.php">Health Records</a>
              </li>
             
              <li class="nav-item">
            
                  <a class="nav-link" href="./index.php" onclick="fun()">Logout</a>
                <form action="your_action_url_here" method="post">
                </form>
        

              </li>
            </ul>
        </nav>
        <hr class="line">
        <div class="hero-info poppins-medium">
          <div class="quote">
          <h1 class="poppins-bold">MEDISYNC</h1>
       
          <h2>
            "Welcome to your health journey. Every step forward is a victory. Together, we'll navigate this path towards wellness and healing."
          </h2>
          


          <div class="hero-img">
            <img src="./hospital2.png" alt="">
        </div>
        <div
          class="manage">
          <h2>
            "We are here to...."
          </h2>
        </div>
        <div class="benifits-info poppins-medium">
          <div class="benifit-box">
              <img src="./prescription.png" alt="">
             
              
          </div>
          <div class="benifit-box">
            <img src="./dashboard.jpeg" alt="">
            
        </div>
        
          <div class="benifit-box">
              <img src="./graph.png" alt="">
             
          </div>
          
          

        </div>
        <div
          class="mun">
            <div
              class="'mun1">
              <h2>"Manage your prescriptions" ,</h2>
            </div>
            <div
              class="'mun2">
              <h2>"Build Your health" </h2>
            </div>
            <div
              class="'mun2">
                <h2>"Manage Your reports"  </h2>
            </div>

          
                      
          
        </div>
        

    <main>
        <!-- Content will be dynamically loaded here based on user selection -->
       
</body>
<script>
  function fun(){
    alert("Loggedout successfully");
  }

</script>

</html>
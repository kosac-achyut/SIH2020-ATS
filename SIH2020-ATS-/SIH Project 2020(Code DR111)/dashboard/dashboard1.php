
<?php 
session_start();
$con = mysqli_connect("localhost","root","","ATS");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con ->connect_error);
}
    $email_find = $_SESSION["email"];
$query1 = mysqli_query($con,"SELECT  `college_name`FROM `Admin` WHERE college_email='$email_find'");


    $row = mysqli_fetch_assoc($query1);
        $college = $row["college_name"];

    $query2 = mysqli_query($con,"SELECT `Event_detail` FROM `Event` WHERE `colleg_name`='$college'");
    $row2 = mysqli_fetch_assoc($query2);
          
    $Event_text = $row2["Event_detail"];   

    $fname="";
    $lname="";
    $college_code="";


    $query1 = mysqli_query($con,"SELECT  `college_code`FROM `Admin` WHERE college_email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
        $college_code = $row["college_code"];
    
    
    if(isset($_POST['logout']))
    {
        $val = 'no';
        $udt=mysqli_query($con,"UPDATE myDb SET log_in='$val' WHERE email='$email_find'");
        header('location: ../index.php');
        
    }
   






?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Final</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="shortcut icon" href="bong.png" type="image/x-icon">
</head>
<body>

  <!--Navbar--->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="">ATS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard1.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="event/event2.php">Add Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search/search2.php">Search</a>
      </li>      
        <li class="nav-item">
        <a class="nav-link" href="new.php">Requets</a>
        </li>
    </ul>
<form class="form-inline my-2 my-lg-0" action="dashboard.php" method="POST">
<button name ="logout" class="btn btn-outline-success my-2 my-sm-0">Logout</button>
</form>
  </div>
</nav>
  <!--Navbar--->
  <!---dashboard--->
      <div class="container">
        <div class="profile-bar">
          <img class="profile_img" src="profile_img.jpg" alt="profile-image" width="250px" height="250px" style="margin-bottom: 20px;">
     
          
        </div>
        <div class="info-bar">
         <form>
              
               <p class="input-head">Email<p>
                  <input id="input_field" type="email" class="form-control" placeholder="xxxxxxxx@gmail.com" readonly value="<?=$email_find?>">
              <p class="input-head">College Code<p>
                  <input id="input_field" type="txt" class="form-control" placeholder="College Code" readonly value="<?=$college_code?>">
               <p class="input-head">College Name<p>
                  <input id="input_field" type="text" class="form-control" placeholder="SRM IST" readonly value="<?=$college?>">
                
          </form>
          
        </div>
        <div class="Calender">
          <h1 style="margin-left: 20%;">Events</h1>
            <input type="text" name="event_text" class="input_box" style="margin-left: 15%;
  border: none;
  border-radius: 10px;
  width: 70%;
  height: 30%;" readonly value="<?=$Event_text?>">
            <img class="Govlogo" src="Seal_of_Goa.png">
      </div>
      </div>
  <!---dashboard--->
  <script type="text/javascript" src="index.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  height: 30px;
  width: 100%;
  background-color: rgba(236, 240, 241,0.9);
  color: black;
  text-align: center;
}
</style>

<div class="footer">
  <p>Copyright  &copy;:Codesmokers</p>
</div>

</body>
</html>

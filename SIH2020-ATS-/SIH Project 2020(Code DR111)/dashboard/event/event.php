<?php 
session_start();
$con = mysqli_connect("localhost","root","","ATS");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con ->connect_error);
}
    $email_find = $_SESSION["email"];
$query1 = mysqli_query($con,"SELECT  `college_name`FROM `myDb` WHERE email='$email_find'");


    $row = mysqli_fetch_assoc($query1);
        $college = $row["college_name"];      

if(isset($_POST["event_button"]))
{
  $event_name = strip_tags($_POST['event_txt']);


  $error=0;

  
  if($error==0)
  {
  
  $query = mysqli_query($con,"UPDATE `Event` SET `Event_detail`='$event_name' WHERE `colleg_name` = '$college'");
      echo "<script>alert('Your Event has been set')</script>";
      header('localhost:../dashboard.php');
  }
}




?>




<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Final</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="event.css">
  <link rel="shortcut icon" href="bong.png" type="image/x-icon">
</head>
<body>

  <!--Navbar--->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ATS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../dashboard.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Add Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search/search.php">Search</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link " href="../chatapp.php">Chatroom</a>
      </li>
    </ul>
  </div>
</nav>
  <!--Navbar--->
  <!--Event--->
    <div class="container">
      <form action="event.php" method="POST">
        <div class="form-group">
    <label   for="inputlg">Add Event</label>
    <input maxlength="180" class="form-control input-lg " id="inputlg" type="text" name="event_txt">
    <p style="font-size: 10px;">Max Chracter 180.</p>
    <button class="btn btn-secondary" name="event_button" type="submit">Click to Add Event</button>
  </div>
        <from>
    </div>
  <!---Event--->
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

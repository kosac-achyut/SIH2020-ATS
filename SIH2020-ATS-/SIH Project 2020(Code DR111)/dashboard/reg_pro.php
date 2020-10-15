<?php

session_start();
$con = mysqli_connect("localhost","root","","ATS");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con ->connect_error);
}

 $email= $_SESSION["email"];

 $bio="";
 $age="";
 $work="";
 $work_post="";
 $work_dur="";
 $phone="";

 if(isset($_POST["reg_button"]))
 {
   $bio = strip_tags($_POST['bio']);
   $age = strip_tags($_POST['age']);
   $worki = strip_tags($_POST['work']);
   $work_post = strip_tags($_POST['work_post']);
   $work_dur = strip_tags($_POST['work_dur']);
   $phone = strip_tags($_POST['phone']);

   $query = mysqli_query($con,"UPDATE `pro_info` SET `age`='$age' Where `email`='$email'");
   $query1 = mysqli_query($con,"UPDATE `pro_info` SET `bio`='$bio' Where `email`='$email'");
   
   $query2 = mysqli_query($con,"UPDATE `pro_info` SET `work_dur`='$work_dur' Where `email`='$email'");
   $query3 = mysqli_query($con,"UPDATE `pro_info` SET `work_post`='$work_post' Where `email`='$email'");
   $query4 = mysqli_query($con,"UPDATE `pro_info` SET `phone`='$phone' Where `email`='$email'");

   $query5 = mysqli_query($con,"UPDATE `pro_info` SET `work`='$worki' Where `email`='$email'");
     
     header('location: dashboard.php');



 }



?>
<!DOCTYPE html>
<html>
<head>

  <title>registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">ATS</a>
</nav>
<div class="container">
  <form action="reg_pro.php" method="POST">
     <div class="form-row bar-pad">
    <div class="col">
      <label for="inputName">Write About yourself(Max Char 180)</label>
      <input type="text" maxlength="180" name="bio" class="form-control" placeholder="About yourself..." >
    </div>
    <div class="col">
      <label for="inputName">Age</label>
      <input type="number" name="age" class="form-control" placeholder="Age" required="true">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Where do you Work?</label>
      <input type="text" name="work" class="form-control"  placeholder="Company Name" required="true">
    </div>
    <div class="form-group col-md-6">
      <label >Post at Company?</label>
      <input type="text" name="work_post" class="form-control"  placeholder="Company Post" required="true">
    </div>
  </div>
  <div class="form-row">
   <div class="col-md-6">
      <label>Work Duration?</label>
      <input type="number" name="work_dur" class="form-control"  placeholder="Work Duration" required="true">
    </div>
    <div class="col-md-6">
      <label>Phone No.</label>
      <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"  placeholder="Phone Number" required="true">
    </div>
  </div>

  

 
  <button type="submit"  name="reg_button" class="btn btn-secondary btn-lg" style="margin-top: 10px;">Update</button>
</form>
</div>

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

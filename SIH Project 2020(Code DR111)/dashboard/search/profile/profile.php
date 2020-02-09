<?php
    
    session_start();
    $con = mysqli_connect("localhost","root","","ATS");
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con ->connect_error);
    }
    $email_find = $_SESSION['next'];
    $query1 = mysqli_query($con,"SELECT  `college_name`FROM `myDb` WHERE email='$email_find'");
    
    $row = mysqli_fetch_assoc($query1);
    $college = $row["college_name"];
    
    $query2 = mysqli_query($con,"SELECT `Event_detail` FROM `Event` WHERE `colleg_name`='$college'");
    $row2 = mysqli_fetch_assoc($query2);

    $Event_text = $row2["Event_detail"];

    $fname="";
    $lname="";
    $college_id="";
    $batch_year="";
    $bio="";
    $work="";
    $work_post="";
    $work_dur="";
    $phone="";
    $age="";


    $query1 = mysqli_query($con,"SELECT  `fname`FROM `myDb` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $fname = $row["fname"];
    $query1 = mysqli_query($con,"SELECT  `lname`FROM `myDb` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $lname = $row["lname"];
    $query1 = mysqli_query($con,"SELECT  `college_id`FROM `myDb` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $college_id = $row["college_id"];
    $query1 = mysqli_query($con,"SELECT  `grad_year`FROM `myDb` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $batch_year = $row["grad_year"];

    $query1 = mysqli_query($con,"SELECT  `bio`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $bio = $row["bio"];

    $query1 = mysqli_query($con,"SELECT  `work`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $work = $row["work"];

    $query1 = mysqli_query($con,"SELECT  `work_post`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $work_post = $row["work_post"];

    $query1 = mysqli_query($con,"SELECT  `work_dur`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $work_dur = $row["work_dur"];

    $query1 = mysqli_query($con,"SELECT  `age`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $age = $row["age"];


    $query1 = mysqli_query($con,"SELECT  `phone`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $phone = $row["phone"];

    ?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>USER profile</title>
<link rel="stylesheet" type="text/css" href="profile.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<form class="form-inline" action="../search.php">
<button class="btn btn-primary my-2 my-sm-0" type="submit" name="back"><--</button>
</form>
</nav>

<div class="container">
<img src="default.png" alt="profile_image">
<form>
<div class="row">
<div class="col">
<p class="input-head">First Name<p>
<input id="input_field" type="text" class="form-control" placeholder="Achyut" readonly value="<?=$fname?>">
</div>
<div class="col">
<p class="input-head">Last Name<p>
<input id="input_field" type="text" class="form-control" placeholder="Saroch" readonly value="<?=$lname?>">
</div>
</div>
<p class="input-head">Email<p>
<input id="input_field" type="email" class="form-control" placeholder="xxxxxxxx@gmail.com" readonly value="<?=$email_find?>">
<p class="input-head">Batch Year<p>
<input id="input_field" type="Year" class="form-control" placeholder="03/07/2000" readonly value="<?=$batch_year?>">
<p class="input-head">College Name<p>
<input id="input_field" type="text" class="form-control" placeholder="SRM IST" readonly value="<?=$college?>">
<p class="input-head">College ID<p>
<input id="input_field" type="text" class="form-control" placeholder="RA18111003030302" readonly value="<?=$college_id?>">
<p class="input-head">Age<p>
<input id="input_field" type="text" class="form-control" placeholder="Update Your AGE" readonly value="<?=$age?>">
<p class="input-head">Working At:<p>
<input id="input_field" type="text" class="form-control" placeholder="Update Your Work" readonly value="<?=$work?>">
<p class="input-head">Working Duration:<p>
<input id="input_field" type="text" class="form-control" placeholder="Update Your Exprience in Working" readonly value="<?=$work_dur?>">
<p class="input-head">Work Post<p>
<input id="input_field" type="text" class="form-control" placeholder="Update Your Postion at Work" readonly value="<?=$work_post?>">
<p class="input-head">Phone<p>
<input id="input_field" type="text" class="form-control" placeholder="Update Your Contact" readonly value="<?=$phone?>">
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


<?php

$con = mysqli_connect("localhost","root","","ATS");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con ->connect_error);
}
$result="";
$row="";
$result_first = "xxx";
  $result_last = "xxx";
if(isset($_POST['reg_button']))
{
    $search = $_POST['search'];
    $_SESSION['next'] = $search;
  $query1 = mysqli_query($con,"SELECT `fname`, `lname` FROM `myDb` WHERE `email`='$search'");
  if(mysqli_num_rows($query1) > 0)
  {
    $row = mysqli_num_rows($query1);
  $result = mysqli_fetch_assoc($query1);
  $result_first = $result['fname'];
  $result_last = $result['lname'];
  }
  else
  {
    $result_first = "not found";
  $result_last = "not found";

  }

 
}

  if(isset($_POST['r_button']))
{

   header('location:profile/profile.php');
 

}


?>



<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="search.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="shortcut icon" href="bong.png" type="image/x-icon">
  </head>
  <body style="background: url(images.jpg) no-repeat center center fixed;">
    <!--NAVABR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ATS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="../dashboard1.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../event/event2.php">Add Event</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="search2.php">Search<span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="../chatapp.php">Chatroom</a>
      </li>
    </ul>
  </div>
</nav>
<!---NAVBAR-->
    <div class="Search">
      <div class="search_bar">
      <form style="display: inline-block;" action="search.php" method="POST">
        <input class="input_field" type="email" name="search" placeholder="Email Address" required="true">
        <button class="btn btn-outline-light btn-lg" name="reg_button">Search</button>
      </form>
    </div>
  </div>
   <div class="Search">
      <div class="search_bar">
  <form class="row" action="search.php" method="POST">
    <div class="col">
   <input type="text" name="First_Name" value="<?=$result_first?>" readonly="true">
    </div>
    <div class="col">
   <input type="text" name="Last_Name" value="<?=$result_last?>" readonly="true">
    </div>
     <div class="col" >
   <button  class="btn btn-success" name="r_button">Check Account</button>
    </div>
  </div>
  </form>
</div>
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

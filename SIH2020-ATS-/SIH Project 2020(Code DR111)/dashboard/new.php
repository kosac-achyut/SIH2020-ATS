

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="bong.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ATS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="dashboard1.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../event/event2.php">Add Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search/search2.php">Search<span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="../chatapp.php">Chatroom</a>
      </li>
<li class="nav-item active">
<a class="nav-link" href="dashboard1.php">Request</a>
</li>
    </ul>
  </div>
</nav>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ATS";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if(isset($_POST['r_button']))
{
    $temp = $_POST['input'];
    $query1 = mysqli_query($con,"UPDATE `myDb` SET `valdit`='yes' WHERE `email`='$temp'");
}

if(isset($_POST['l_button']))
{
    $temp2 = $_POST['input'];
    $query2 = mysqli_query($con,"DELETE FROM `myDb` WHERE `email`='$temp2'");
}



    $query = mysqli_query($con,"SELECT * FROM myDb WHERE `valdit`='no'");
    if(mysqli_num_rows($query)==0)
    {
        echo '<p>No query found</p>';
    }
    else
    {
    while ($row = $query->fetch_assoc()) {
        $rest = $row['email'];
        echo '<form action="new.php" method="POST" ><div class="container">';
        echo '<input type="text" name = "input" placeholder="hello" value="';
        echo $rest;
        echo '">';
        echo '<input type="text" placeholder="hello" value="';
        echo $row['fname'];
        echo '">';
        echo '<input type="text" placeholder="hello" value="';
        echo $row['lname'];
        echo '">';
        echo '<button type="Submit" name="r_button"class="btn btn-success">validate</button>      <button type="Submit" class="btn btn-danger" name="l_button">delete</button> </div> </form>';
    }
    }
    
?>

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

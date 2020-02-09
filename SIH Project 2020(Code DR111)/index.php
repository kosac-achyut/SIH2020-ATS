<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ATS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM myDb WHERE email='$uname'AND password='$password' limit 1";
    
    $result=mysqli_query($conn,$sql);
    $log="SELECT log_in FROM myDb WHERE email='$uname'AND password='$password' limit 1";
    $result1=mysqli_query($conn,$log);
    $qsr = mysqli_fetch_assoc($result1);
    if(mysqli_num_rows($result)==1 && $qsr["log_in"]=="no" ){

            $_SESSION["email"] = $uname;
        $val = 'yes';
        $udt=mysqli_query($conn,"UPDATE myDb SET log_in='$val' WHERE email='$uname'");
            header('location: dashboard/dashboard.php');
       

        exit();
    }
    elseif(mysqli_num_rows($result)==1 && $qsr["log_in"]=="yes" ){
        
       echo "<script>alert('Session logined please sign out from other device.');</script>";
        
        
        exit();
    }
    else{
        echo "<script>alert('You Have Entered Incorrect Password/User Name');</script>";
        exit();
    }
        
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<>
	<link rel="stylesheet" type="text/css" href="index.css">
	<meta name="author" content="Codesmokers">
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
      <li class="nav-item active">
        <a class="nav-link" href="#">Login as Alumni<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Login as Admin</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="About_us/about.php">About Codesmoker</a>
      </li>       
    </ul>
  </div>
</nav>

	<div class="loginbox">
		<h1>SIGN IN</h1>
    <h4></h4>

<form  action="index.php" method="POST" >
			<input id ="user_id" type="text" name="username" placeholder="Enter Username">
			<input id="user_pass" type="password" name="password" placeholder="Enter Password">
			<a class = "forgot" href="#">     Forgot password?</a><br>
			<button class="btn btn-secondary btn-lg" onclick="g()" >LOGIN</button>
			<a  class ="signup" href="reg.php">Don't have a account Signup?</a>
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

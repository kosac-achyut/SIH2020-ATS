<?php

// Create connection
$con = mysqli_connect("localhost","root","","ATS");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con ->connect_error);
}



$fname ="";
$lname ="";
$em ="";
$password="";
$college_id="";
$college_name="";
$grad_year="";

if(isset($_POST["reg_button"]))
{

		$fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);
    $fname = ucfirst(strtolower($fname));

   

		$lname = strip_tags($_POST['reg_lname']);
		$lname = str_replace(' ','',$lname);
		$lname = ucfirst(strtolower($lname));
   


		$em = strip_tags($_POST['reg_email']);
		$em = str_replace(' ','',$em);
		$em = ucfirst(strtolower($em));



		$password = strip_tags($_POST['reg_pass']);

    $passwordmd5 = md5($password);


		$college_name = strip_tags($_POST['reg_collname']);
		$college_name = str_replace(' ','',$college_name);
		$college_name = ucfirst(strtolower($college_name));

		$college_id = strip_tags($_POST['reg_collid']);
		$college_id = str_replace(' ','',$college_id);
		$college_id = ucfirst(strtolower($college_id));

    $grad_year = strip_tags($_POST['reg_year']);

    $error = 0;

		$echeck = mysqli_query($con, "SELECT email FROM myDb WHERE email='$em'");

		$num_rows = mysqli_num_rows($echeck);

		if($num_rows > 0)
		{echo 'Email already in use';
  $error = 1;
		}

    if(strlen($fname)> 25||strlen($fname) < 2)
    {echo 'your first name must be between 2 to 25 character';
    $error = 1;

    }
     if(strlen($lname)> 25||strlen($lname) < 2)
    {echo 'your last name must be between 2 to 25 character';
    $error = 1;

    }

    if(preg_match('/[^A-Za-z0-9]/',$password))
    {
       echo 'Your password can only contain english character or number';
         $error = 1;

    }

    if(strlen($password)>30 || strlen($password)<5)
    {
      echo 'Your password lenght should be between 5 to 30';
        $error = 1;
    }
    
    $query = mysqli_query($con,"INSERT INTO `myDb`(`user_id`, `fname`, `lname`, `email`, `password`, `college_id`, `college_name`, `grad_year`, `log_in`, `valdit`,`rights`) VALUES (NULL,'$fname','$lname','$em','$password','$college_id','$college_name','$grad_year','no','no','0')");
    
    
    if($error==0)
    {
           
    $query2 = mysqli_query($con,"INSERT INTO `pro_info`(`email`, `age`, `bio`, `work`, `work_post`, `phone`, `work_dur`) VALUES ('$em',NULL,NULL,NULL,NULL,NULL,NULL)");

      header('location: index.php');
    }
   

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
	<form action="reg.php" method="POST">
  	 <div class="form-row bar-pad">
    <div class="col">
    	<label for="inputName"> First Name</label>
      <input type="text" name="reg_fname" class="form-control" placeholder="First name" required="true">
    </div>
    <div class="col">
    	<label for="inputName">Last Name</label>
      <input type="text" name="reg_lname" class="form-control" placeholder="Last name" required="true">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="reg_email" class="form-control" id="inputEmail4" placeholder="Email" required="true">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="reg_pass" class="form-control" id="inputPassword4" placeholder="Password" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="inputCollegename">College Name</label>
    <input type="text" class="form-control" name="reg_collname" id="College Name" placeholder="College name" required="true">
  </div>
  <div class="form-group">
    <label for="inputCollegeid">College ID</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="College Id" name="reg_collid" required="true">
  </div>

  <div class="form-group">
    <label for="inputCollegeid">Graduation Year</label>
    <input type="Year" class="form-control" id="inputYear" placeholder="Graduation Year" name="reg_year" required="true">
  </div>
 
  <button type="submit"  name="reg_button" class="btn btn-secondary btn-lg">SignUp</button>
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

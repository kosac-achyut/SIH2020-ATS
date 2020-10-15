
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
    
    $query1 = mysqli_query($con,"SELECT  `age` FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
    $age = $row["age"];



         $query1 = mysqli_query($con,"SELECT  `phone`FROM `pro_info` WHERE email='$email_find'");
    $row = mysqli_fetch_assoc($query1);
        $phone = $row["phone"];   


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
  <a class="navbar-brand" href="#">ATS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search/search.php">Search</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="chatapp.php">Chatroom</a>
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
          <input type="text" name="bio" placeholder="About your self" style="" value="<?=$bio?>" style="border-radius: 10px;">
          <a href="reg_pro.php">Update your Profile</a>


<h1 style="margin-left: 20%;">Events</h1>
<input type="text" name="event_text" class="input_box" style="border: none;border-radius: 10px;width: 70%;height: 30%;" readonly value="<?=$Event_text?>">

  </div>
          

        <div class="info-bar">
         <form>
              <div class="row">
                <div class="col">
                  <p class="input-head">First Name<p>
                  <input id="input_field" type="text" class="form-control" placeholder="First Name" readonly value="<?=$fname?>">
                </div>
                <div class="col">
                  <p class="input-head">Last Name<p>
                  <input id="input_field" type="text" class="form-control" placeholder="Last Name" readonly value="<?=$lname?>">
                </div>
              </div>
               <p class="input-head">Email<p>
                  <input id="input_field" type="email" class="form-control" placeholder="Your Email" readonly value="<?=$email_find?>">
              <p class="input-head">Batch Year<p>
                  <input id="input_field" type="Year" class="form-control" placeholder="Year" readonly value="<?=$batch_year?>">
               <p class="input-head">College Name<p>
                  <input id="input_field" type="text" class="form-control" placeholder="College Name" readonly value="<?=$college?>">
               <p class="input-head">College ID<p>
                  <input id="input_field" type="text" class="form-control" placeholder="College ID or Roll Number" readonly value="<?=$college_id?>">   
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
        <div class="Calender">
<div class="chat">
<h1>CHATROOM</h1>
<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-database.js"></script>


<!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>

<script>
// Your web app's Firebase configuration
var firebaseConfig = {
apiKey: "AIzaSyB7USDylb8A75Oa87FoLjxKxXVSih7YQ48",
authDomain: "my-test-project-68a21.firebaseapp.com",
databaseURL: "https://my-test-project-68a21.firebaseio.com",
projectId: "my-test-project-68a21",
storageBucket: "my-test-project-68a21.appspot.com",
messagingSenderId: "252818520994",
appId: "1:252818520994:web:daadb5d1e6a83219c710fb",
measurementId: "G-61G8GF9Y0N"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
var myName = prompt("Enter your name");
function sendMessage(){
    //get message
    var message = document.getElementById("message").value;
    //save in database
    firebase.database().ref("messages").push().set({
                                                   "sender":myName,
                                                   "message": message
                                                   
                                                   });
    // prevent form from submitting
    return false;
}
// listen for incoming message
firebase.database().ref("messages").on("child_added",function (snapshot)
                                       {
                                       var html= "";
                                       //give each message a unique ID
                                       html +="<li id='message-"+snapshot.key +"'>";
                                       //show delete button if message is sent by me
                                       if(snapshot.val().sender == myName) {
                                       html += "<button class='btn btn-danger' style='margin-right:10px;' data-id='"+snapshot.key+"'onclick='deleteMessage(this);'>";
                                       html += "Delete";
                                       
                                       html += "</button>"
                                       }
                                       html += snapshot.val().sender +": " + snapshot.val().message;
                                       html += "</li>";
                                       document.getElementById("messages").innerHTML += html;
                                       
                                       });

function deleteMessage(self) {
    //get message ID
    var messageId = self.getAttribute("data-id");
    
    //delete message
    firebase.database().ref("messages").child(messageId).remove();
}


// attach listener for delete message
firebase.database().ref("messages").on("child_removed", function(snapshot){
                                       // remove message node
                                       document.getElementById("message-" + snapshot.key).innerHTML = "<p style='color:red;'>This message has been removed</p>";
                                       });


</script>

<ul id="messages" class="mess"></ul>
<!-- create a form to send message -->
<form onsubmit="return sendMessage();">
<input class="input_box" id ="message" placeholder="Enter message" autocomplete="off">
<br/>
<input type="submit" class="btn btn-primary" value="-->">
</form>
</div>

<!-- create list-->


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

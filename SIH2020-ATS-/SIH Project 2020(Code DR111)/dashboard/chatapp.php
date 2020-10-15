<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style_chatapp.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

  


<div class="container">

  <div class="box">
      <h1>CHATROOM</h1>
<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-app.js"></script>

<!-- include firebase database -->
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

<!-- create list-->

</div>
<form class="form-inline" action="dashboard.php">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go Back</button>
  </form>
</div>

</body>
</html>


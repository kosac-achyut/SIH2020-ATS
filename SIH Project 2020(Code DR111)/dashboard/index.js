


/*document.getElementsByTagName("p")[0].setAttribute("contenteditable", "true"); 
	document.getElementsByTagName("p")[1].setAttribute("contenteditable", "true"); 
	document.getElementsByTagName("p")[2].setAttribute("contenteditable", "true"); */


function Logout()
{
	var txt;
  if (confirm("Want to Logout?")) {
    location.replace("https://www.google.co.in/")
  } else {
    txt = "You pressed Cancel!";
  }
  console.log(txt);
}

function editinfo()
{
	document.getElementsByTagName("input")[0].removeAttribute("readonly"); 

	document.getElementsByTagName("input")[1].removeAttribute("readonly"); 	
	document.getElementsByTagName("input")[3].removeAttribute("readonly"); 	
	
	
}

function save()
{
	document.getElementsByTagName("input")[0].setAttribute("readonly","true"); 


	document.getElementsByTagName("input")[1].setAttribute("readonly","true");

		document.getElementsByTagName("input")[3].setAttribute("readonly","true"); 	
	

}



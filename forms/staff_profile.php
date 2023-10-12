<?php

include '../control/config.php';

session_start();

if(!isset($_SESSION['staff_name'])){
	
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Staff Profile</title>

  

  <link rel="stylesheet" href="../css/style.css">
</head>
<style >
    body{
          
            background-size: cover;
            margin: 0;
            text-align: center;
            
            max-width: 100%;
            padding: 50px 0;
            font-family: 'Poppins', sans-serif;
         }
         table, th, td {
  
  text-align: center;

}
table {
  width: auto;
  height:200px;
}
.reg{
   background-color: rgba(255, 255, 255, 0.8);
   
     display: inline;
     text-align:left;
     padding: auto;
      width: 100%;
     
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 3px solid red;
}



</style>
<body>



<header>
       <?php include 'header.php';?>
</header>

<section>

  <nav>
  
  <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="staff_profile.php">Profile</a>
  <a href="logout.php">Logout</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ </button>  
</div>

  
  
  
  
  
    <ul>
	








<button class="dropbtn" ><a href="staff.php">Dash Board</a> </button>

  
  
  
  
  
  
  
  
 <div> 
  <li class="dropdown">
   <button onclick="myFunction2()" class="dropbtn">Parcel</button>
    <div id="myDropdown2" class="dropdown-content">
		<a href="add_parcel_staff.php">  Make new parcel</a>
			<a href="tracker_staff.php">Search Parcel</a>
	<a href="parcel_list_staff.php">Check all Parcel</a>

    </div>
  </li>
      </div>
<div>
    <li class="dropdown">
    <button onclick="myFunction3()" class="dropbtn">Report</button>
    <div  id="myDropdown3" class="dropdown-content">
      <a href="#">Financial</a>

    </div>
  </li>
  </div>
  





    </ul>
  </nav>

  
  
  
  <article>
    <h1>Profile</h1>
  <div class="grid-container">
  
 <fieldset class="reg">
			<form name= "regform" onsubmit ="return validateForm();" action = "../control/admin_profile_update.php"  method="POST" >
		       

		      <label>ID</label> <br>
				<input type="text" name="id" id = "id" value="<?php echo $_SESSION['staff_id'] ?>"></span>
                 <br><hr> 

		        <label>Name</label> 
				<input type="text" name="name" id = "name" value="<?php echo $_SESSION['staff_name'] ?>"><span style= "color:red" id = "alert"></span>
                 <br><hr>
				 <label>E-mail</label>
				<input type="text" name="email" id = "email" value="<?php echo $_SESSION['staff_email'] ?>"><span style= "color:red" id = "alert1"></span>
                <br><br><hr>
				
				<label>Password</label>
				<input type="Password" name="password" id = "password"value="<?php echo $_SESSION['staff_pass'] ?>" ><span style= "color:red" id = "alert4"></span>
				
                <input type="checkbox" name="showpassword" id="showpassword" onclick="myFunction()">

                <label for="showpassword">Show password</label>
				<br><br><hr>
				<label>Confirm Password</label>
				<input type="Password" name="cpassword" id = "cpassword"><span style= "color:red" id = "alert5"></span>
<input type="checkbox" name="showpassword" id="showpassword" onclick="myFunct()">	
<label for="showpassword">Show password</label>			
				<br><br><hr>


				
                <input type="submit" name="update" value="update">
			   
				<?php if (isset($_GET['error'])) { ?>
			    <p class="error" style="color:red; font-size: 100%; font-weight: bold;"><?php echo $_GET['error']; ?></p><?php }?>
			   
			
		</fieldset>
</div>
  
  
  </article>
</section>






<script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}
function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}
function myFunction3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}


window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}






function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

        function myFunction() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
      function myFunct() {
  var password = document.getElementById("cpassword");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
</script>

<script src="../js/admin_profile.js"></script>



<br>
<br>
<br>
<br>
<br>







<footer>
  <?php include 'footer.php';?>
</footer>

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
<title>E-SRK Transportaion</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/design.css">
</head>

<style>
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid Green;
}

.button1:hover {
  background-color: Green;
  color: white;
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
  <a href="admin_profile.php">Profile</a>
  <a href="logout.php">Logout</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ </button>  
</div>

  
  
  
  
  
    <ul>
	








	  <button class="dropbtn" ><a href="admin.php">Dash Board</a> </button>

  
  
  <div> 
  <li class="dropdown">
  
    <button onclick="myFunction()" class="dropbtn">Branch</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="add_branch.php">Add New Branch</a>
      <a href="branch_list.php">List All</a>
    </div>
  </li>
      </div>
  
  
  
  
  <div> 
  <li class="dropdown">
   <button onclick="myFunction1()" class="dropbtn">staff</button>
    <div id="myDropdown1" class="dropdown-content">
   <a href="add_staff.php">Add new</a>
      <a href="staff_list.php">List All</a>
    </div>
  </li>
      </div>
  
  
  
  
  
  
 <div> 
  <li class="dropdown">
   <button onclick="myFunction2()" class="dropbtn">Parcel</button>
    <div id="myDropdown2" class="dropdown-content">
		<a href="add_parcel.php">  Make new parcel</a>
			<a href="#">Search Parcel</a>
	<a href="#">Check all Parcel</a>
    
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
  
  
  <?php
include  '../control/delete_branch.php';
?>
<?php
include '../control/config.php';
error_reporting(0);
$id=$_GET['id'];
$name = $_GET['name'];
$street= $_GET['street'];
$city = $_GET['city'];
$contact=$_GET['contact'];
?>
  
  
  
 <div class="contain">
  <h1>New Branch</h1>
  <hr style="height:2px;border-width:0;color:gray;background-color:red)">
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">
    <label for="id">ID :</label>
     <input type="text" id="id" name="id" value="<?php echo "$_GET[id]"?>" required=''>
     <label for="Name">Name :</label>
     <input type="text" id="name" name="name" value="<?php echo "$_GET[name]"?>" required=''>
     <label for="street">Street:</label>
     <input type="text" name="street" id="street" value="<?php echo "$_GET[street]"?>" required=''>
	 
     <label for="city">City:</label>
     <input type="text" id="city" name="city" value="<?php echo "$_GET[city]"?>" required=''>
    <label for="contact">contact:</label>
     <input type="text" id="contact" name="contact" value="<?php echo "$_GET[contact]"?>" required=''>
    
     <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
     <input type="submit" class="button1" name="delete" value="Delete"></button>
     
   </form>
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



</script>













<footer>
  <?php include 'footer.php';?>
</footer>

</body>
</html>


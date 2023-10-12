<!DOCTYPE html>
<html lang="en">
<head>
<title>E-SRK Transportaion</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/design.css">
</head>
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
include  '../control/update_staff.php';
?>
<?php
include '../control/config.php';
error_reporting(0);
$id=$_GET['id'];
$name = $_GET['name'];
$email= $_GET['email'];
$password = $_GET['password'];
$joining_date = $_GET['joining_date'];
$role=$_GET['role'];
$branch = $_GET['branch '];
?>
 <div class="contain">
 <h1>New Stuff</h1>
   <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
    <form id="orderForm" method="post" action="../control/insert_staff.php">
        <label for="id">ID :</label>
     <input type="text" id="id" name="id" value="<?php echo "$_GET[id]"?>" required=''>
	  
	    <label for="Name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo "$_GET[name]"?>" required=''>
      
       <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo "$_GET[email]"?>"required=''>
     <label for="password">Password:</label>
     <input type="password" name="password" id="password" value="<?php echo "$_GET[password]"?>" required=''>
	    <label for="joining_date">Joining Date:</label>
     <input type="date" name="joining_date" id="joining_date"value="<?php echo "$_GET[joining_date]"?>" required=''>
	 
	    <label for="role">Role:</label>
      <select id="role" name="role" value="<?php echo "$_GET[role]"?>" required=''>
	  <option value="staff">Staff</option>
        <option value="admin">Admin</option>
      </select>
	 
	 
	
	 
      <label for="Branch">Branch:</label>
<select id="branch" name="branch" value="<?php echo "$_GET[branch]"?>"required>
    <?php
    $sql = "SELECT branch_name FROM branch"; // Query to retrieve branch names
    $result = oci_parse($conn, $sql);
    oci_execute($result);

    while ($row = oci_fetch_assoc($result)) {
        $branch_name = $row['BRANCH_NAME'];

        echo "<option value='$branch_name'>$branch_name</option>";
    }

    oci_free_statement($result);
    ?>
      </select>
     
	 
	
	 
	 
	 
      
	  
	  
	  
	  
     
      <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
     <input type="submit" class="button1" name="update" value="Update">
      
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


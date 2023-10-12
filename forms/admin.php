<!DOCTYPE html>
<html lang="en">
<head>
<title>E-SRK Transportaion</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
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
			<a href="tracker.php">Search Parcel</a>
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
  
  
  
  
    <h1>Home</h1>
	
	

	
	
	

  <div class="grid-container">
  <div class="grid-item">    <?php echo date("Y-m-d");?></div> 
  <div class="grid-item"><?php
include '../control/config.php'; // Assuming this includes the database connection

// Create an SQL query to fetch data from the "branch" table
$sql = "SELECT COUNT(*) as branch_count FROM branch";

// Prepare the statement
$stmt = oci_parse($conn, $sql);

// Execute the statement
oci_execute($stmt);

// Fetch the result
$row = oci_fetch_assoc($stmt);

// Close the statement
oci_free_statement($stmt);

// Close the connection
oci_close($conn);

// Display the result
if ($row['BRANCH_COUNT'] > 0) {
    echo "Total Branches: " . $row['BRANCH_COUNT'];
} else {
    echo "No data";
}
?>
	
</div>
  <div class="grid-item"><?php
include '../control/config.php'; // Assuming this includes the database connection

// Create an SQL query to fetch data from the "branch" table
$sql = "SELECT COUNT(*) as staff_count FROM user_form";

// Prepare the statement
$stmt = oci_parse($conn, $sql);

// Execute the statement
oci_execute($stmt);

// Fetch the result
$row = oci_fetch_assoc($stmt);

// Close the statement
oci_free_statement($stmt);

// Close the connection
oci_close($conn);

// Display the result
if ($row['STAFF_COUNT'] > 0) {
    echo "Total Staffs: " . $row['STAFF_COUNT'];
} else {
    echo "No data";
}
?></div>
  <div class="grid-item"><?php
include '../control/config.php'; // Assuming this includes the database connection

// Create an SQL query to fetch data from the "branch" table
$sql = "SELECT COUNT(*) as parcel_count FROM parcel";

// Prepare the statement
$stmt = oci_parse($conn, $sql);

// Execute the statement
oci_execute($stmt);

// Fetch the result
$row = oci_fetch_assoc($stmt);

// Close the statement
oci_free_statement($stmt);

// Close the connection
oci_close($conn);

// Display the result
if ($row['PARCEL_COUNT'] > 0) {
    echo "Total Parcel: " . $row['PARCEL_COUNT'];
} else {
    echo "No data";
}
?></div>  
  <div class="grid-item">Collected</div>
  <div class="grid-item">In transit</div>
  <div class="grid-item">Arrived at Destination</div>  
  <div class="grid-item">Delivered</div>
  <div class="grid-item">Unsuccessful Delivery </div>
  
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


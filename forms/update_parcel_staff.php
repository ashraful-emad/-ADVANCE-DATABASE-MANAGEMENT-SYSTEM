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
			<a href="#">Search Parcel</a>
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
  

<?php
include '../control/config.php';
include  '../control/update_parcel_staff.php';
error_reporting(0);
$pid = $_GET['pid'];
$status= $_GET['status'];
$id=$_SESSION['admin_id'];

?>
  
  
  
  
  
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">

        <div class="contain">
        <div class="row">
            <h1 align="center">New Parcel</h1>
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
            <label for="pid">Parcel ID:</label>
        <input type="text" id="pid" name="pid" value="<?php echo "$_GET[pid]"?>" required=''>
        

<div class="row">
    <div class="column">
        <label for="status">Status:</label>
        <select id="status" name="status"  required=''>
    <?php
    $sql = "SELECT status_name FROM status"; // Query to retrieve branch names
    $result = oci_parse($conn, $sql);
    oci_execute($result);

    while ($row = oci_fetch_assoc($result)) {
        $status= $row['STATUS_NAME'];
        echo "<option value='$status'>$status</option>";
    }

    oci_free_statement($result);
    ?>
        </select>
    </div>
</div>
	
	    <tr>

    <input type="submit" class="button1" name="update" value="Update"></button>
   
    </tr>
  </tfoot>
</table>
</div>

      
   </form>
  
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















</body>
<footer>
  <?php include 'footer.php';?>
</footer>
</html>


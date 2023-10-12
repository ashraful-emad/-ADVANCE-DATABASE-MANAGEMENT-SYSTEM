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
include  '../control/insert_parcel.php';
error_reporting(0);
$name = $_GET['name'];
$address = $_GET['address'];
$contact = $_GET['contact'];
$rname = $_GET['rname'];
$raddress = $_GET['raddress'];
$rcontact = $_GET['rcontact'];
$pbranch = $_GET['pbranch ']; 
$rbranch = $_GET['rbranch ']; 
$height = $_GET['height'];
$width = $_GET['width'];
$length = $_GET['length'];
$weight = $_GET['weight'];
$price = $_GET['price'];
$id=$_SESSION['admin_id']

?>
  
  
  
  
  
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">

        <div class="contain">
        <div class="row">
            <h1 align="center">New Parcel</h1>
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
            <div class="column">
               
       <h3 align="center">Sender Information</h3>
       <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
     
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo "$_GET[name]"?>" required=''>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo "$_GET[address]"?>" required=''>
       
       <label for="contact">Contact#</label>
       <input type="text" name="contact" id="contact" value="<?php echo "$_GET[contact]"?>" required=''>
           
      
    </div>
    <div class="column">
        <h3 align="center">Recipient Information</h3>
        <hr style="height:2px;border-width:0;color:gray;background-color:rgb(49, 124, 194)">
        
           <label for="rname">Name:</label>
           <input type="text" id="rname" name="rname" value="<?php echo "$_GET[rname]"?>" required=''>
           
           <label for="raddress">Address:</label>
           <input type="text" id="raddress" name="raddress" value="<?php echo "$_GET[raddress]"?>" required=''>
          
          <label for="rcontact">Contact#</label>
          <input type="text" name="rcontact" id="rcontact" value="<?php echo "$_GET[rcontact]"?>" required=''>
              
         
    </div>
    </div>
  
<div class="row">
    <div class="column">
        <label for="pbranch">Branch Proceed:</label>
        <select id="pbranch" name="pbranch"  required=''>
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
    </div>
    <div class="column">
        <label for="rbranch">Pickup Branch:</label>
        <select id="rbranch" name="rbranch"  required=''>
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
    </div>
</div>

<div class="row">

<h3>Parcel Information</h3>
    <table >
        <tr>
          
          <th>Height</th>
          <th>Width</th>
          <th>Length</th>
          <th>Weight</th>
          <th>Price</th>
         
        </tr>
        <tr>
            <td ><input type="number" name="height" id="height" value="<?php echo "$_GET[height]"?>" step="0.1" required=''></td>
            <td><input type="number" name="width" id="width" value="<?php echo "$_GET[width]"?>" required='' ></td>
            <td><input type="number" name="length" id="length" value="<?php echo "$_GET[length]"?>" required='' ></td>
            <td><input type="number"  name="weight" id="weight" value="<?php echo "$_GET[weight]"?>" required='' ></td>
            <td><input type="number" name="price" id="price" value="<?php echo "$_GET[price]"?>" required=''></td>
           
          </tr>
          
</table>
<table class="t">
<tfoot>
    <tr>
   <input type="hidden" name="id" id = "id" value="<?php echo $_SESSION['admin_id'] ?>"></span>
                 <br>
     
    </tr>
	
	
	    <tr>

    <input type="submit" class="button1" name="insert" value="Insert"></button>
   
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


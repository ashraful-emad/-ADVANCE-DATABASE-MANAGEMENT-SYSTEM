<!DOCTYPE html>
<html lang="en">
<head>
<title>E-SRK Transportaion</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
</head>
<style >

         table, th, td {
  border: 1px solid;
  text-align: center;

}
table {
  width: 100%;
  height:200px;
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
   <h1>Branch list</h1>
             <?php
   include '../control/config.php';
    // select or read data start
   $select = "SELECT
    b.branch_code,
    b.branch_name,
    b.street,
    b.city,
    bc.contact
FROM
    branch b
JOIN
    branch_contact bc ON b.branch_code = bc.branch_code
ORDER BY branch_code DESC";
   
  $result = oci_parse($conn, $select);

    oci_execute($result);
 
  
$row = oci_fetch_array($result);
   
      if (oci_num_rows($result) > 0) {
		  
       echo"<table>
       <tr> 
       <th>Branch Code</th> 
       <th>Branch Name</th> 
       <th>Street</th>
       <th>City</th>
	   <th>Contact</th>
       <th colspan='2' >Operation</th>
   
       </tr>";
   
          do {
           echo "<tr > 
           <td>" . $row['BRANCH_CODE']. "</td> 
            <td>" . $row['BRANCH_NAME']. "</td>
            <td>" . $row['STREET']. "</td>
            <td>" . $row['CITY']. "</td>
			<td>" . $row['CONTACT']. "</td>
            <td><a href='../forms/update_branch.php?id=$row[BRANCH_CODE]&name=$row[BRANCH_NAME]&street=$row[STREET]&city=$row[CITY]&contact=$row[CONTACT]'>update </td>
              <td><a href='../forms/delete_branch.php?id=$row[BRANCH_CODE]&name=$row[BRANCH_NAME]&street=$row[STREET]&city=$row[CITY]&contact=$row[CONTACT]'>Delete </td>
           
           </tr>";
		  }while($row =oci_fetch_assoc($result));
       echo"</table>";
	  }else{
		  echo"0 results";
	  }
  
    oci_free_statement($result);
    oci_close($conn);
  
     ?>
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


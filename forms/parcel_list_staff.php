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
  width: 400px;
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
   <h1>Parcel list</h1>
   
                <?php
   include '../control/config.php';
    // select or read data start
   $select = "   SELECT 
      p.*,
      sn.status_name
   FROM
      parcel p
   JOIN
      status sn ON p.status_id = sn.status_id
   ORDER BY
      p.parcel_id DESC
";
   
  $result = oci_parse($conn, $select);

    oci_execute($result);
 
  
$row = oci_fetch_array($result);
   
      if (oci_num_rows($result) > 0) {
		  
       echo"<table>
       <tr> 
       <th>Parcel ID</th> 
       <th>Sender Name</th> 
	   <th>Sender Address</th> 
       <th>Sender Number</th>
	   <th>Receiver name</th>
	   <th>Receiver Address</th>
	   <th>Receiver Number</th>
	   <th>From</th> 
	   <th>To</th> 
	   <th>Height</th>
	   <th>Width</th> 
	   <th>Length</th>
       <th>Weight</th> 	   
	   <th>Price</th>
       <th>Status</th>
	   <th>Received By</th>
       <th colspan='2' >Operation</th>
   
       </tr>";
   
           do {
           echo "<tr > 
           <td>" . $row["PARCEL_ID"]. "</td> 
            <td>" . $row["SENDER_NAME"]. "</td>
			<td>" . $row["SENDER_ADDRESS"]. "</td>
            <td>" . $row["SENDER_CONTACT"]. "</td>
            <td>" . $row["RECEIVER_NAME"]. "</td>
			 <td>" . $row["RECEIVER_ADDRESS"]. "</td>
			  <td>" . $row["RECEIVER_CONTACT"]. "</td>
			   <td>" . $row["BRANCH_PROCESSED"]. "</td>
			   <td>" . $row["PICKUP_BRANCH"]. "</td>
			    <td>" . $row["HEIGHT"]. "</td>
				 <td>" . $row["WIDTH"]. "</td>
				  <td>" . $row["LENGTH"]. "</td>
				  <td>" . $row["WEIGHT"]. "</td>
			 <td>" . $row["PRICE"]. "</td>
			  <td>" . $row["STATUS_NAME"]. "</td>
             <td>" . $row["ID"]. "</td>
            <td><a href='../forms/update_parcel_staff.php?pid=$row[PARCEL_ID]&name=$row[SENDER_NAME]&address=$row[SENDER_ADDRESS]&
			contact=$row[SENDER_CONTACT]&rname=$row[RECEIVER_NAME]&raddress=$row[RECEIVER_ADDRESS]&rcontact=$row[RECEIVER_CONTACT]&
			pbranch=$row[BRANCH_PROCESSED]&rbranch=$row[PICKUP_BRANCH]&height=$row[HEIGHT]&width=$row[WIDTH]&
			length =$row[LENGTH]&weight=$row[WEIGHT]&price =$row[PRICE]&status_name=$row[STATUS_NAME]'>update </td>
              
			  
			  
			  <td><a href='../forms/delete_parcel_staff.php?pid=$row[PARCEL_ID]&name=$row[SENDER_NAME]&address=$row[SENDER_ADDRESS]&
			contact=$row[SENDER_CONTACT]&rname=$row[RECEIVER_NAME]&raddress=$row[RECEIVER_ADDRESS]&rcontact=$row[RECEIVER_CONTACT]&
			pbranch=$row[BRANCH_PROCESSED]&rbranch=$row[PICKUP_BRANCH]&height=$row[HEIGHT]&width=$row[WIDTH]&
			length =$row[LENGTH]&weight=$row[WEIGHT]&price =$row[PRICE]&status_name=$row[STATUS_NAME]''>Delete </td>
           
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


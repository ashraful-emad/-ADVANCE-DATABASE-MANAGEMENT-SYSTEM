<?php
include '../control/config.php';
session_start();

$emptyInput = false;


// Get form input
if(isset($_POST['login'])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if the user exists
    $select = "SELECT *  FROM user_form  WHERE email = '$email' AND password = '$password' ";

    $result = oci_parse($conn, $select);


       oci_execute($result);
	   $row = oci_fetch_array($result);
    // Fetch user data
   //$userType = trim($row['role']);

    if($email == "" || $password==""){
          $_SESSION['emptyemail'] = true;
    $emptyInput = true;
      
    }

   if(oci_num_rows($result) > 0){
	

if ($row['ROLE'] == 'admin') {
      $_SESSION['admin_id'] = $row['0'];
         $_SESSION['admin_name'] = $row['1'];
		  $_SESSION['admin_email'] = $row['2'];
		 $_SESSION['admin_pass'] = $password;
		 $_SESSION['admin_joining_date'] = $row['4'];
		 $_SESSION['admin_role'] = $row['5'];
		 $_SESSION['admin_branch_code'] = $row['6'];
         header('location:../forms/admin.php');
} elseif ($row['ROLE'] == 'staff') {
	        $_SESSION['staff_id'] = $row['0'];
         $_SESSION['staff_name'] = $row['1'];
		  $_SESSION['staff_email'] = $row['2'];
		 $_SESSION['staff_pass'] = $password;;
		 $_SESSION['staff_joining_date'] = $row['4'];
		 $_SESSION['staff_role'] = $row['5'];
		 $_SESSION['staff_branch_code'] = $row['6'];
         header('location:../forms/staff.php');
}
   }else{
	echo '<script>alert("USER not Found")</script>'; 
	 $_SESSION['emptyemail'] = true;
    $emptyInput = true;
	header('location:../forms/login.php');
	
}
   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['remember'])){
$remember =$_POST['remember'];


if($remember==1){

setcookie('uname',$email,time()+60*60*24,"/");
setcookie('pass',$password,time()+60*60*24,"/");

}
}
    oci_free_statement($result);
    oci_close($conn);
};
?>

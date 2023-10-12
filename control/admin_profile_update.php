
<?php
include '../control/config.php';
 session_start();

if(isset($_POST['update'])){



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $name =$_POST["name"];
   $email =$_POST["email"];
   $password =$_POST["password"];
// sql to update a record
$sql = "UPDATE user_form SET name='$name', email = '$email',password= '$password' WHERE id= $id";
$result = oci_parse($conn, $sql);
oci_execute($result);
if ($result == TRUE) {


$_SESSION['update'] = true;
 

header('location:../forms/login.php');


setcookie('uname',$email,time()-60*60*24,"/");
setcookie('pass',$pass,time()-60*60*24,"/");

  //header("Location:../forms/admin_home.php");

} else {
 echo '<script>alert("Invalid Information")</script>';
 header("Location:../forms/admin_profile.php");
}

   oci_free_statement($result);
    oci_close($conn);
  

}
}


?>


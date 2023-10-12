
<?php
 include 'config.php';
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$user_type = $_POST['user_type'];
$emptyInput = false;


$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['cpassword'] = $cpassword;
$_SESSION['user_type'] = $user_type;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($name == "") {
  $_SESSION['nameErr']=true;
  $emptyInput=true;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $_SESSION['nameErr2'] = true;
	  $emptyInput=true;
    }
  }

  if (empty($_POST["email"])) {
  $_SESSION['emailErr'] = true;
  $emptyInput=true;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['emailErr2'] = true;
    $emptyInput=true;
	}
  }



  if (empty($_POST["password"])) {
  $_SESSION['passwordErr'] = true;
  $emptyInput=true;
  } 
   if(
    $password = test_input(strlen($_POST["password"])<='8'))
	{
  $_SESSION['passwordErr2'] = true;
  $emptyInput=true;
   
  }

 if (empty($_POST["user_type"])) {
  $_SESSION['user_typeErr'] = true;
  } else {
    $user_type = test_input($_POST["user_type"]);
  }


if ($emptyInput) {
    header('location:../forms/registration.php');
} 
if ($_POST["password"]!=$_POST['cpassword']) {
 $_SESSION['cpasswordErr'] = true;
        header('location:../forms/registration.php');
} else if($_POST["password"]=$_POST['cpassword'])
{
 
$password = test_input($_POST["password"]);

	  

$sql = "INSERT INTO user_form (name, email,password,user_type)
VALUES ('$name', '$email','$password','$user_type')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully <br>";
  // select or read data start
header("Location:../forms/login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	  
	  
	  
  }
  


 // $conn->close();
  
}





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

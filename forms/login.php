<?php

require '../control/valid_login.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="login_style.css"/>
</head>
<style >
      body {
       background-color: white;
        background-size: cover;
        margin: 0;
        text-align: center;
    }
    
</style>
<body>

   <table>
        <tr>
            <td ><?php include 'header.php';?></td>
        </tr>
        <tr>
            <td>
   <form action="../control/valid_login.php" method="post">
        <?php
if(isset($error)){
  foreach($error as $error ){
    echo '<span class="error -msg">'.$error.'</span>';
  };
  };
?>
<br>
<fieldset>
<label for="email">Email</label>
<hr>
<input type="text" name="email" id="email" placeholder="Email"value="<?php if(isset($_COOKIE['uname']))echo $_COOKIE['uname'];?>">
<br>
  <?php
            if (isset($_SESSION['emptyemail'])) {
                echo '<script>alert("Invalid email or password")</script>'; 
                unset($_SESSION['emptyemail']);
            }
            ?>
 
<hr>
<label for="password">Password</label>
<hr>
<input type="password" name="password" id="password" placeholder="password"value="<?php if(isset($_COOKIE['pass']))echo $_COOKIE['pass'];?>">
 <hr>
 <input type="checkbox" name="showpassword" id="showpassword" onclick="myFunction()">

<label for="showpassword">Show password</label>
<br>
<hr>
<label for="remember">Remember me </label>
<input type="checkbox" name="remember" id="remember" value="1">
<br>
<hr>
<a href="">Forgotten password?</a>
<br>
<hr>
<input type="submit"  class="button1" name="login" id="login" value="Login"onclick="myfunc()">
<br>
<hr>
</fieldset>
 </form>
  </td>
        </tr>
    </table>
	 <?php
            if (isset($_SESSION['update'])) {
               echo '<script>alert("Profile updated..Please login again ")</script>'; 
                unset($_SESSION['update']);
            }
            ?>
		
	
	
    <script>
        function myFunction() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
    </script>

        <script>
        function myfunc() {
  var email = document.getElementById('email');
  var password= document.getElementById('password');
    
if(email.value === ''|| password.value===''){
    alart("enter password ") ;
}
  
}
    </script>



</div>
 <td ><?php include 'footer.php';?></td>
</body>
</html>

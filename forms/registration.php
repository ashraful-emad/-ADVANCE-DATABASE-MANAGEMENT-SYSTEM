
<?php
session_start();
if (!isset($_SESSION['name']))
{
    $_SESSION['name'] = "";
}
if (!isset($_SESSION['email']))
{
    $_SESSION['email'] = "";
}
if (!isset($_SESSION['password']))
{
    $_SESSION['password'] = "";
}
if (!isset($_SESSION['cpassword']))
{
    $_SESSION['cpassword'] = "";
}
if (!isset($_SESSION['user_type']))
{
    $_SESSION['user_type'] = "";
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/login_style.css"/>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
 <table>
        <tr>
            <td ><?php include 'header.php';?></td>
        </tr>
        <tr>
            <td>
<form method="post" action="../control/validation.php">
    <?php
      if(isset($error)){
         foreach($error as $error){
           
         echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?><br>
<fieldset>
<lebel for="name">Name: </lebel>
<span class="error">*  <?php
            if (isset($_SESSION['nameErr'])) {
                echo "<p class='error_message'>Name is empty</p>";
                unset($_SESSION['nameErr']);
            }
			if (isset($_SESSION['nameErr2'])) {
                echo "<p class='error_message'>Only letters and white space allowed</p>";
                unset($_SESSION['nameErr2']);
            }
            ?></span>
<br>
<input type="text" name="name" id="name" value="" >
 <hr>


<lebel for="email">Email: </lebel>
<span class="error">*   <?php
            if (isset($_SESSION['emailErr'])) {
                echo "<p class='error_message'>email is empty</p>";
                unset($_SESSION['emailErr']);
            }
			 if (isset($_SESSION['emailErr2'])) {
                echo "<p class='error_message'>email is invalid format</p>";
                unset($_SESSION['emailErr2']);
            }
            ?></span>
<br>
<input type="text" name="email" id="email" value="">

 <hr>


<lebel for="password"> Password:</lebel> 
<span class="error">* <?php
            if (isset($_SESSION['passwordErr'])) {
                echo "<p class='error_message'>Password is empty</p>";
                unset($_SESSION['passwordErr']);
            }
			if (isset($_SESSION['passwordErr2'])) {
                echo "<p class='error_message'>Password must be longer then 8</p>";
                unset($_SESSION['passwordErr2']);
            }
            ?></span>
<input type="password" name="password" id="password" value="">
 <hr>
 <input type="checkbox" name="showpassword" id="showpassword" onclick="myFunction()">
 <label for="showpassword">Show password</label>
<br>
 <hr>

<lebel for="cpassword">Confirm Password:</lebel> 
<span class="error">* <?php
            if (isset($_SESSION['cpasswordErr'])) {
                echo "<p class='error_message'>Password not matched</p>";
                unset($_SESSION['cpasswordErr']);
            }
            ?></span>
<br>
<input type="password" name="cpassword" id="cpassword" value="">

 <hr>



User:
       <select name="user_type">
         <option value="user">User</option>
         <option value="rider">Rider</option>
         <option value="admin">Admin</option>
      </select>


<br>



<input type="submit" class="button1" name="submit" value="Submit">
</fieldset>
</form>

       </td>
 </tr>
 </table>
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

</body>

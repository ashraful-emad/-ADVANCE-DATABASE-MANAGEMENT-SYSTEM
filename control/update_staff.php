<?php
include 'config.php';
if(isset($_POST['update'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id=$_POST['id'];
$name = $_POST['name'];
$email= $_POST['email'];
$password = $_POST['password'];
$joining_date = $_POST['joining_date'];
$role=$_POST['role'];
$branch = $_POST['branch '];


 $select = "select branch_code from branch where branch_name='$branch'";
    $result = oci_parse($conn, $select);
    oci_execute($result);
if($result== true){
	
	$row = oci_fetch_assoc($result);
$branch_code = $row['BRANCH_CODE'];


    $select = "UPDATE user_form SET name='$name', email='$email', password='$password', joining_date=TO_DATE('$joining_date_formatted', 'YYYY-MM-DD'), role='$role', branch_code='$branch_code' WHERE id='$id'";
    $stmt = oci_parse($conn, $select);
    oci_execute($stmt);

   
   
        echo "Branch : $stmt";
        header("Location:../forms/staff_list.php");
		echo "Record updated successfully";
    
}

}else {
        echo "Error updating record: ";
        header("Location:../forms/update_staff.php");
    }

    oci_free_statement($result);
    oci_close($conn);
}

?>

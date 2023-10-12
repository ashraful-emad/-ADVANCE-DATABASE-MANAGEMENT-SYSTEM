<?php
include 'config.php';
if(isset($_POST['update'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    $select = "update branch_contact SET contact = '$contact' where branch_code = '$id'";
    $stmt = oci_parse($conn, $select);
    oci_execute($stmt);

    if ($stmt == TRUE) {
        // UPDATE into branch table
        $sql = "UPDATE branch SET branch_name='$name', street='$street', city='$city' where branch_code='$id'";
        $result = oci_parse($conn, $sql);
        oci_execute($result);

        
        
		 
		  header("Location:../forms/branch_list.php");
		echo "Record updated successfully";
    } else {
        echo "Error updating record: ";
        header("Location:../forms/update_branch.php");
    }

    oci_free_statement($result);
    oci_close($conn);
}
}
?>

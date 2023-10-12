<?php
include 'config.php';
session_start();

if (isset($_POST['insert'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $rname = $_POST['rname'];
        $raddress = $_POST['raddress'];
        $rcontact = $_POST['rcontact'];
        $pbranch = $_POST['pbranch'];
        $rbranch = $_POST['rbranch'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $weight = $_POST['weight'];
        $price = $_POST['price'];
       $id=$_SESSION['admin_id'];
	   
    $bp_code = "select branch_code from branch where branch_name = '$pbranch'";
$bp = oci_parse($conn, $bp_code);
oci_execute($bp);
$row = oci_fetch_assoc($bp);
$b_id = $row['BRANCH_CODE'];

   $rp_code = "select branch_code from branch where branch_name = '$rbranch'";
$rp = oci_parse($conn, $rp_code);
oci_execute($rp);
$rowr = oci_fetch_assoc($rp);
$r_id = $rowr['BRANCH_CODE'];







            $select = "INSERT INTO parcel VALUES(parcel_id.NEXTVAL,'$name','$address','$contact','$rname','$raddress','$rcontact','$b_id',
			'$r_id ','$height','$width','$length','$weight','$price',1,$id)"; 
            $stmt = oci_parse($conn, $select);
            oci_execute($stmt);

            if ($stmt == TRUE) {
                echo "Record updated successfully";
            }
        else {
            echo "Error inserting record: ";
            header("Location:../forms/insert_branch.php");
        }

        oci_free_statement($stmt);
      
        oci_close($conn);
    }
}
?>

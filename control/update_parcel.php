<?php

include 'config.php';

if (isset($_POST['update'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pid = $_POST['pid'];
        $status = $_POST['status'];

       
        $select = "SELECT status_id FROM status WHERE status_name = '$status'";
        $stmt = oci_parse($conn, $select);
        oci_execute($stmt);

        if ($row = oci_fetch_assoc($stmt)) {
            $s_id = $row['STATUS_ID'];

          
            $query = "UPDATE parcel SET status_id = '$s_id' WHERE parcel_id = '$pid'";
            $result = oci_parse($conn, $query);
            oci_execute($result);

            echo "Record updated successfully";
            header("Location: ../forms/parcel_list.php");
        } else {
            echo "Error updating record: ";
        }

        oci_free_statement($stmt);
        oci_free_statement($result);
        oci_close($conn);
    }
}

?>

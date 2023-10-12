<?php

include 'config.php';

if (isset($_POST['delete'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pid = $_POST['pid'];

        // SQL to delete a record
        $sql = "DELETE FROM parcel WHERE parcel_id = '$pid'";
        $result = oci_parse($conn, $sql);
        oci_execute($result);

        if ($result == true) {
            echo "Record deleted successfully";
            header("Location: ../forms/parcel_list.php");
        } else {
            echo "Error deleting record";
        }

        oci_free_statement($result);
        oci_close($conn);
    }
}

?>

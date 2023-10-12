<?php
include 'config.php';
if(isset($_POST['insert'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        
        // Insert into branch table
        $sql = "INSERT INTO branch(branch_code, branch_name, street, city) VALUES (branch_code.NEXTVAL, '$name', '$street', '$city')";
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        
        if ($result == TRUE) {
           

            // Get the branch_code value
            $b_code_query = "SELECT branch_code FROM branch WHERE ROWNUM = 1 ORDER BY branch_code DESC";
            $b_code_stmt = oci_parse($conn, $b_code_query);
            oci_execute($b_code_stmt);
            $b_code_row = oci_fetch_assoc($b_code_stmt);
            $b_code = $b_code_row['BRANCH_CODE'];

            // Insert into branch_contact table
            $insert_contact_query = "INSERT INTO branch_contact VALUES (branch_contact_id.NEXTVAL, '$contact', '$b_code')";
            $insert_contact_stmt = oci_parse($conn, $insert_contact_query);
            oci_execute($insert_contact_stmt);

            if ($insert_contact_stmt == TRUE) {
                echo "Record updated successfully";
            }
        } else {
            echo "Error inserting record: ";
            header("Location:../forms/insert_branch.php");
        }
        
        oci_free_statement($insert_contact_stmt);
        oci_free_statement($b_code_stmt);
        oci_free_statement($result);
        oci_close($conn);
    }
}
?>

<?php
include 'config.php';

if(isset($_POST['update'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $joining_date = $_POST['joining_date'];
        $role = $_POST['role'];
        $branch = $_POST['branch'];

        // Format the date using PHP before inserting
        $joining_date_formatted = date("Y-m-d", strtotime($joining_date));

        // Insert into user_form table
        $sql = "INSERT INTO user_form VALUES (id.NEXTVAL, '$name', '$email', '$password', TO_DATE('$joining_date_formatted', 'YYYY-MM-DD'), '$role', (SELECT branch_code FROM branch WHERE branch_name = '$branch'))";
        $result = oci_parse($conn, $sql);
        oci_execute($result);

        if ($result == TRUE) {
			 echo '<script>alert("Record updated successfully")</script>';
         
			header("Location:../forms/staff_list.php");
        } else {
            echo "Error inserting record: ";
            header("Location:../forms/insert_staff.php");
        }

        oci_free_statement($result);
        oci_close($conn);
    }
}
?>

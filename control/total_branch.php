<?php
include 'config.php'; // Assuming this includes the database connection

// Create a PL/SQL block
$plsql = "DECLARE
             c NUMBER(2);
          BEGIN
             c := totalbranch();
             :result := c;
          END";

// Prepare the statement
$stmt = oci_parse($conn, $plsql);


// Execute the statement
oci_execute($stmt);

// $result now contains the value returned by totalbranch() PL/SQL function
?>


<?php
oci_free_statement($stmt);
?>

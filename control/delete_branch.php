<?php

include 'config.php';

if(isset($_POST['delete'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $select="delete from branch_contact where branch_code= '$id'";
  $stmt= oci_parse($conn, $select);
        oci_execute($stmt);
  if ($stmt== TRUE){
  
  
// sql to delete a record
$sql = "DELETE FROM branch WHERE branch_code= $id";
 $result = oci_parse($conn, $sql);
        oci_execute($result);
if ($result== TRUE) {
  echo "Record deleted successfully";
  header("Location: ../forms/branch_list.php");

} 

}else {
  echo "Error deleting record: " ;
}
   oci_free_statement($stmt);
   oci_free_statement($result);
    oci_close($conn);
  

}

}
?>
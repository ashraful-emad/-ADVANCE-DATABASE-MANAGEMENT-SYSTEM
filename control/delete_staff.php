<?php

include 'config.php';

if(isset($_POST['delete'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  
  
// sql to delete a record
$sql = "delete from user_form where id= $id";
 $result = oci_parse($conn, $sql);
        oci_execute($result);
if ($result== TRUE) {
  echo "Record deleted successfully";
  header("Location: ../forms/staff_list.php");

} 

}else {
  echo "Error deleting record: ";
}
   
   oci_free_statement($result);
    oci_close($conn);
  

}


?>
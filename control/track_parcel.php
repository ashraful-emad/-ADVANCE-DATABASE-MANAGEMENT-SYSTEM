<?php

include 'config.php';

if (isset($_POST['search'])) {
	
	
	
	
	$pid = $_POST['pid'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $select = "SELECT 
    p.*,
    sn.status_name
FROM
    parcel p
JOIN
    status sn ON p.status_id = sn.status_id
WHERE
    p.parcel_id = $pid";

        $result = oci_parse($conn, $select);
        oci_execute($result);

	if ($result > 0) {
            echo "<table>
                <tr> 
                    <th>Parcel ID</th> 
                    <th>Sender Name</th> 
                    <th>Sender Address</th> 
                    <th>Sender Number</th>
                    <th>Receiver name</th>
                    <th>Receiver Address</th>
                    <th>Receiver Number</th>
                    <th>From</th> 
                    <th>To</th> 
                    <th>Height</th>
                    <th>Width</th> 
                    <th>Length</th>
                    <th>Weight</th> 	   
                    <th>Price</th>
                    <th>Status</th>
                </tr>";

            while ($row = oci_fetch_assoc($result)) {
                echo "<tr> 
                    <td>" . $row["PARCEL_ID"] . "</td> 
                    <td>" . $row["SENDER_NAME"] . "</td>
                    <td>" . $row["SENDER_ADDRESS"] . "</td>
                    <td>" . $row["SENDER_CONTACT"] . "</td>
                    <td>" . $row["RECEIVER_NAME"] . "</td>
                    <td>" . $row["RECEIVER_ADDRESS"] . "</td>
                    <td>" . $row["RECEIVER_CONTACT"] . "</td>
                    <td>" . $row["BRANCH_PROCESSED"] . "</td>
                    <td>" . $row["PICKUP_BRANCH"] . "</td>
                    <td>" . $row["HEIGHT"] . "</td>
                    <td>" . $row["WIDTH"] . "</td>
                    <td>" . $row["LENGTH"] . "</td>
                    <td>" . $row["WEIGHT"] . "</td>
                    <td>" . $row["PRICE"] . "</td>
                    <td>" . $row["STATUS_NAME"] . "</td>
                </tr>";
            }
            echo "</table>";
        } else{
		  echo"0 results";
	  }

        oci_free_statement($result);
        oci_close($conn);
    }
}

?>

<?php
// Replace with your Oracle 10g database connection details
$host = "XE";
$port = "1521";
$dbname = "XE";
$username = "data";
$password = "data";

// Establish Oracle database connection
$conn = oci_connect($username, $password);
  ?>
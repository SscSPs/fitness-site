<?php

//require this file to get db connection and modificitions should be done here.
// require 'commonFiles/getConnection.php';

$db = mysqli_connect("localhost", "root", "", "Project_fitness");
if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
  }

?>

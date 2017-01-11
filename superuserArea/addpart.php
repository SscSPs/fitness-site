<?php
session_start();

if(isset($_SESSION['authenticated']))
{
$db = mysqli_connect("localhost", "root", "", "Project_fitness");
if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
}
if(isset($_POST['submitpart'])){
  $partName = mysqli_real_escape_string($db, $_POST['partName']);

  $sql = "SELECT * FROM `project_body_parts` WHERE `project_body_parts`.`name` = '$partName'";
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    echo $_POST['partName'] . " already exist";
  }
  else {
    $sql1 = $db->query("INSERT INTO project_body_parts(name, number_of_exercise) VALUE('$partName', 0)");
    if($sql1)
      {
        echo "Part Added Successfully";
      }
  }
}

  echo '<form action="addpart.php" method="post">';
  echo '<label for="partName" style="width:200px;display: inline-block;">Body Part Name</label>';
  echo '<input type="text" name="partName" id="partName" placeholder="Part Name" required/><br>';
  echo '<input type="submit" name="submitpart" value="Add Part" />';
  echo '</form>';
}
?>

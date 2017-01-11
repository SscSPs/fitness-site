<?php
session_start();

if(isset($_SESSION['authenticated']))
{
  $db = mysqli_connect("localhost", "root", "", "Project_fitness");
  if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
  }

  $fetchBodyParts = "SELECT id, name, number_of_exercise FROM project_body_parts";
  $result = $db->query($fetchBodyParts);
  if ($result->num_rows > 0) {

    echo '<form action="removepart.php" method="post">';
    echo '<div id="div1">';
    echo '<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
    echo '<select name="BodyPart" id="BodyPart">';
    while($row = $result->fetch_assoc()) {
      echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
    }
    echo '</select>';
    echo '<input type="submit" value="Remove Part" onclick="hide();" />';
    echo '</div>';
    echo '<div id="div2">';
    echo '<input type="submit" name="submitremovepart" value="Confirm" onclick="hide();" />';
    echo '<input type="submit" value="Cancel" onclick="show();" />';
    echo '</div>';
    echo '</form>';
    echo '<script>
      function hide(){
        div1.style.visibility = "hidden";
        div2.style.visibility = "visible";
      }
      function show(){
        div1.style.visibility = "visible";
        div2.style.visibility = "hidden";
      }
    ';
  }

  if(isset($_POST['submitremovepart'])){

  }

}


?>

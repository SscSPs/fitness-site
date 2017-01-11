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
    echo '<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
    echo '<select name="BodyPart" id="BodyPart">';
    while($row = $result->fetch_assoc()) {
      echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
    }
    echo '</select>';
    echo '<div id="div1">';
    echo '<button type="button" onclick="hide();">Remove Part</button>';
    echo '</div>';
    echo '<div id="div2">';
    echo '<input type="submit" name="submitremovepart" value="Confirm" onclick="hide();" />';
    echo '<button type="button" onclick="show();">Cancel</button>';
    echo '</div>';
    echo '</form>';
    echo '<script>
      show();
      function hide(){
        div1.style.visibility = "hidden";
        div2.style.visibility = "visible";
        BodyPart.disabled = TRUE;
      }
      function show(){
        div1.style.visibility = "visible";
        div2.style.visibility = "hidden";
      }
      </script>
    ';
  }

  if(isset($_POST['submitremovepart'])){
    $id = mysqli_real_escape_string($db, $_POST['BodyPart']);
    $partName = '';
    while($row = $result->fetch_assoc()){
      if($id == $row["id"])
      {
        $partName=$row["name"];
        break;
      }
    }
    $deletefromParts = "DELETE FROM project_body_parts where id = '$id'";
    $deletefromExercises = "DELETE FROM project_exercises_list where bodyPart = '$partName'";
    $resultforParts = $db->query($deletefromParts);
    $resultforExercises = $db->query($deletefromExercises);
    if($resultforParts){
      if($resultforExercises){
        if($partName==''){
          echo "Deleted the part $id from the parts table.";
        }
        else{
          echo "$partName deleted from parts table and all exercises related to it are also deleted.";
        }
      }
      else{
        echo "some error while deleting from exercise table. Probably done though.";
      }
    }
    else{
      if($resultforExercises){
        echo "Some error occured while removing from body table";
      }
      else{
        echo "Couldn't remove daa from any table";
      }
    }
  }

}


?>

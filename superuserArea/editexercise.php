<?php
$db = mysqli_connect("localhost", "root", "", "Project_fitness");
if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
}
//fetch list of body parts
$fetchBodyParts = "SELECT id, name, number_of_exercise FROM project_body_parts";
$result = $db->query($fetchBodyParts);
if ($result->num_rows > 0) {
  echo '<form action="addexercise.php" method="post">';
  echo '<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
  echo '<select name="BodyPart" id="BodyPart" onchange="bodypartChanged()">';
  while($row = $result->fetch_assoc()) {
    echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
  }
  echo '</select>';
  echo '<br><label for="exerciseName" style="width:200px;display: inline-block;">Exercise Name</label>';
  echo '<select name="exerciseName" id="exerciseName" onchange="exerciseChanged()"></select>';
  echo '<label for="about" style="width:200px;display: inline-block;">Little discription</label>';
  echo '<textarea name="about" id="about" rows="4" cols="25"></textarea>';
  echo '<br><label for="videoLink" style="width:200px;display: inline-block;">Video link</label>';
  echo '<input type="text" name="videoLink" id="videoLink" placeholder="link"/><br>';
  echo '<label for="instrument" style="width:200px;display: inline-block;">Instrument Used</label>';
  echo '<input type="text" name="instrument" id="instrument" placeholder="Instrument used" required/><br>';
  echo '<label for="more" style="width:200px;display: inline-block;">Something more</label>';
  echo '<textarea name="more" id="more" rows="3" cols="25" placeholder="in format \'attributename:data.\'(followed by fullstop)"></textarea>';

  echo '<input type="submit" name="confirmEdit" value="Edit Exercise" />';
  echo '</form>';

}
else {
  echo "Add some body parts first.";
}

?>

<!DOCTYPE html>
<html>
    <body>

        <script>
            function loadform(task, tagname) {
                }
                tagname.innerHTML = text;
            }
        </script>
    </body>
</html>

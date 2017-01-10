<?php
$db = mysqli_connect("localhost", "root", "", "Project_fitness");
if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
}
//fetch list of body parts
echo "<script>";
echo "var partsarray = [];";
echo "</script>";

$fetchBodyParts = "SELECT id, name, number_of_exercise FROM project_body_parts";
$result = $db->query($fetchBodyParts);
if ($result->num_rows > 0) {
  echo '<form action="addexercise.php" method="post">';
  echo '<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
  echo '<select name="BodyPart" id="BodyPart" onchange="bodypartChanged(this)">';
  while($row = $result->fetch_assoc()) {
    echo "<script>";
    echo 'partsarray.push("' . $row["name"] . '");';
    echo "var " . $row["name"] . " = [];";
    $checkExercise = "SELECT * FROM project_exercises_list where bodypart = '" . $row["name"] . "'";
    $result2 = $db->query($checkExercise);
    if ($result2->num_rows == 0) {
      echo $row["name"] . ".push('');";
      echo "hidedivision();";
    }
    else {
      while($row2 = $result2->fetch_assoc()) {
        echo $row["name"] . ".push(\"" . $row2["name"] . "\");";

        echo "console.log('" . $row["name"] . " _ " . $row2["name"] ."') ;";
      }
    }
    echo "</script>";
    echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
  }
  echo '</select>';
  echo '<br><label for="exerciseName" style="width:200px;display: inline-block;">Exercise Name</label>';
  echo '<select name="exerciseName" id="exerciseName" onchange="exerciseChanged(this.value)"></select><br>';
  echo '<div id="division">';
  echo '<label for="about" style="width:200px;display: inline-block;">Little discription</label>';
  echo '<textarea name="about" id="about" rows="4" cols="25"></textarea>';
  echo '<br><label for="videoLink" style="width:200px;display: inline-block;">Video link</label>';
  echo '<input type="text" name="videoLink" id="videoLink" placeholder="link"/><br>';
  echo '<label for="instrument" style="width:200px;display: inline-block;">Instrument Used</label>';
  echo '<input type="text" name="instrument" id="instrument" placeholder="Instrument used" required/><br>';
  echo '<label for="more" style="width:200px;display: inline-block;">Something more</label>';
  echo '<textarea name="more" id="more" rows="3" cols="25" placeholder="in format \'attributename:data.\'(followed by fullstop)"></textarea>';

  echo '<input type="submit" name="confirmEdit" value="Edit Exercise" />';
  echo '</div>';
  echo '</form>';

}
else {
  echo "Add some body parts first.";
}
//js

echo "
<script>
function bodypartChanged(selfobj){
  var text = '';
  var tempbodypart = eval(selfobj.value);
for(i=0; i<tempbodypart.length;i++){
  text += \"<option value='\" + tempbodypart[i] + \"'>\" + tempbodypart[i] + \"</option>\";
}
  exerciseChanged(tempbodypart[0]);
  exerciseName.innerHTML = text;
}
function exerciseChanged(){
  showdivision();
  var abt;
  var vidlnk;
  var instr;
  var mr;

  about.value = abt;
  videoLink.value = vidlnk;
  instrument.value = instr;
  more.value = mr;

}

function hidedivision(){
  division.style.visibility = 'hidden';;
}
function showdivision(){
  division.style.visibility = 'visible';
}

</script>";

?>

<!DOCTYPE html>
<html>
    <body>

    </body>
</html>

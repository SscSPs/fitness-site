<?php
session_start();

if(isset($_SESSION['authenticated']))
{
	require 'commonFiles/getConnection.php';
}
//fetch list of body parts
$fetchBodyParts = "SELECT id, name, number_of_exercise FROM project_body_parts";
$result = $db->query($fetchBodyParts);
if ($result->num_rows > 0) {
	echo '<form action="addexercise.php" method="post">';
	echo '<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
	echo '<select name="BodyPart" id="BodyPart">';
	while($row = $result->fetch_assoc()) {
		echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
	}
	echo '</select>';
	echo '<br><label for="exerciseName" style="width:200px;display: inline-block;">Exercise Name</label>';
	echo '<input type="text" name="exerciseName" id="exerciseName" placeholder="Exercise Name" required/><br>';
	echo '<label for="about" style="width:200px;display: inline-block;">Little discription</label>';
	echo '<textarea name="about" id="about" rows="4" cols="25"></textarea>';
	echo '<br><label for="videoLink" style="width:200px;display: inline-block;">Video link</label>';
	echo '<input type="text" name="videoLink" id="videoLink" placeholder="link"/><br>';
	echo '<label for="instrument" style="width:200px;display: inline-block;">Instrument Used</label>';
	echo '<input type="text" name="instrument" id="instrument" placeholder="Instrument used" required/><br>';
	echo '<label for="more" style="width:200px;display: inline-block;">Something more</label>';
	echo '<textarea name="more" id="more" rows="3" cols="25" placeholder="in format \'attributename:data.\'(followed by fullstop)"></textarea>';

	echo '<input type="submit" name="add" value="Add Exercise" />';
	echo '</form>';
}
else {
	echo "Add some body parts first.";
}

if(isset($_POST['add'])){
	$exerciseName = mysqli_real_escape_string($db, $_POST['exerciseName']);
	$BodyPart = mysqli_real_escape_string($db, $_POST['BodyPart']);
	$about = mysqli_real_escape_string($db, $_POST['about']);
	$videoLink = mysqli_real_escape_string($db, $_POST['videoLink']);
	$instrument = mysqli_real_escape_string($db, $_POST['instrument']);
	$more = mysqli_real_escape_string($db, $_POST['more']);
	$noSpaceBodyPart = preg_replace('/\s+/', '', $BodyPart);
	$noSpaceExerciseName = preg_replace('/\s+/', '', $exerciseName);
	$id = mysqli_real_escape_string($db, $noSpaceBodyPart."_".$noSpaceExerciseName);
	//check if this already exists.
	$checkExercise = "SELECT * FROM project_exercises_list where id = '$id'";
	$result2 = $db->query($checkExercise);
	if ($result2->num_rows == 0) {
		//enter data into exercise table
		$enterExercise = "INSERT INTO project_exercises_list VALUE('$id', '$exerciseName', '$BodyPart', '$instrument', '', '$videoLink', '$about', '$more')";
		$resultentry = $db->query($enterExercise);
		//update number of exercise in body parts table.
		$bodypartupdate = "UPDATE project_body_parts set number_of_exercise = number_of_exercise + 1 WHERE name = '$BodyPart'";
		$bodypartresult = $db->query($bodypartupdate);
		if($resultentry === TRUE && $bodypartresult === TRUE){
			echo "Entry Successful";
		}
		else {
			echo "some error occured<br>" . $db->error;
		}
	}
	else {
		echo $exerciseName . " already exists under " . $BodyPart;
	}
}

?>

<!DOCTYPE html>
<html>
	<body>

		<script>

		</script>
	</body>
</html>

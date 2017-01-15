<?php
$db = mysqli_connect("localhost", "root", "", "Project_fitness");

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$str = file_get_contents('/json/exercises.json', FILE_USE_INCLUDE_PATH); //change this path to json file with data.
$partInserted = 0;
$partInsertFail = 0;
$partUpdated = 0;
$partUpdateFail = 0;
$exerciseUpdated = 0;
$exerciseUpdateFail = 0;
$exerciseInserted = 0;
$exerciseInsertFail = 0;
$json = json_decode($str, true);
$partname = ''; //body part name

for ($i = 0; $i < count($json['part']); $i++) {
	$partname = $json['part'][$i]['name'];
	if (insertpart($partname, $db) == 1) {
		for ($j = 0; $j < count($json['part'][$i]['exercises']); $j++) {
			$exerciseName = mysqli_real_escape_string($db, $json['part'][$i]['exercises'][$j]['name']);
			$id = generateid($partname, $exerciseName, $db);
			$about = mysqli_real_escape_string($db, $json['part'][$i]['exercises'][$j]['info']);
			$videoName = mysqli_real_escape_string($db, $json['part'][$i]['exercises'][$j]['video']['name']);
			$videoLink = mysqli_real_escape_string($db, $json['part'][$i]['exercises'][$j]['video']['link']);
			$instrument = mysqli_real_escape_string($db, $json['part'][$i]['exercises'][$j]['instrument']);
			$moreinfo = mysqli_real_escape_string($db, $json['part'][$i]['exercises'][$j]['moreinfo']);
			if ($moreinfo == 'nothing') {
				$moreinfo = '';
			}

			if (checkIfExist($id, $db) == 1) {
				updateExercise($id, $instrument, $videoName, $videoLink, $about, $moreinfo, $exerciseName, $db);
			}
			else {
				addExercise($id, $exerciseName, $partname, $instrument, $videoName, $videoLink, $about, $moreinfo, $db);
			}
		}
	}
}

echo "<h2>Finshed executing</h2>";
echo "Part Inserted: $partInserted<br />";
echo "Part Insert Failed: $partInsertFail<br />";
echo "Parts Updated: $partUpdated<br />";
echo "Part Update Failed: $partUpdateFail<br /><br />";
echo "Exercise Inserted: $exerciseInserted<br />";
echo "Exercise Insert Failed: $exerciseInsertFail<br />";
echo "Exercise Updated: $exerciseUpdated<br />";
echo "Exercise Update Failed: $exerciseUpdateFail<br />";

// Functions

function updateExercise($id, $instrument, $videoName, $videoLink, $about, $moreinfo, $exerciseName, $db)
{
	global $exerciseUpdated;
	global $exerciseUpdateFail;
	echo "Updating <b>exercise </b>$exerciseName.<br />";
	$exerciseUpdate = "UPDATE project_exercises_list set instrument = '$instrument', videoName = '$videoName', videoAddress='$videoLink', about='$about', moreinfo = '$moreinfo' WHERE id = '$id'";
	$updateResult = $db->query($exerciseUpdate);
	if ($updateResult) {
		echo "<b>Exercise </b>$exerciseName Updated.<br />";
		$exerciseUpdated++;
	}
	else {
		echo "<b>Exercise </b>$exerciseName couldn't be updated.<br />";
		$exerciseUpdateFail++;
	}
}

function addExercise($id, $name, $bodyPart, $instrument, $videoName, $videoAddress, $about, $moreinfo, $db)
{
	global $exerciseInserted;
	global $exerciseInsertFail;
	global $partUpdateFail;
	global $partUpdated;
	echo "<b>Exercise </b>$name does not exist, inserting.. <br />";

	// enter data into exercise table

	$enterExercise = "INSERT INTO project_exercises_list VALUE('$id', '$name', '$bodyPart', '$instrument', '$videoName', '$videoAddress', '$about', '$moreinfo')";
	$resultentry = $db->query($enterExercise);
	if ($resultentry) {
		echo "<b>Exercise </b>$name inserted, updating part table <br />";
		$exerciseInserted++;
	}
	else {
		echo "<b>Exercise </b>$name couldn't be inserted, trying next one. <br />";
		echo $db->error;
		$exerciseInsertFail++;
		return;
	}

	// update number of exercise in body parts table.

	$bodypartupdate = "UPDATE project_body_parts set number_of_exercise = number_of_exercise + 1 WHERE name = '$bodyPart'";
	$bodypartresult = $db->query($bodypartupdate);
	if ($bodypartresult) {
		echo "<b>Part </b>$bodyPart Updated. <br />";
		$partUpdated++;
	}
	else {
		echo "<b>Part </b>$bodyPart couldn't be updated. <br />";
		$partUpdateFail++;
	}
}

function insertpart($nameofpart, $db)
{

	// check if the part already exists, and add it if it does not

	global $partInserted;
	global $partInsertFail;
	$sql = "SELECT * FROM `project_body_parts` WHERE `project_body_parts`.`name` = '$nameofpart'";
	$result = $db->query($sql);
	if ($result->num_rows != 1) {
		echo "<b>Part </b>$nameofpart does not exist, inserting.. <br />";
		$sql1 = $db->query("INSERT INTO project_body_parts(name, number_of_exercise) VALUE('$nameofpart', 0)");
		if ($sql1) {
			echo "<b>Part </b>$nameofpart Added Successfully<br />";
			$partInserted++;
			return 1;
		}
		else {
			echo "<b>Part </b>$nameofpart couldn't be inserted. skipping this part.";
			$partInsertFail++;
			return 0;
		}
	}
	else {
		echo "<b>Part</b> $nameofpart already exists, continuing..<br />";
		return 1;
	}
}

function generateid($partname, $exerciseName, $db)
{

	// generates ID for the exercise tabel.

	$noSpaceBodyPart = preg_replace('/\s+/', '', $partname);
	$noSpaceExerciseName = preg_replace('/\s+/', '', $exerciseName);
	$id = mysqli_real_escape_string($db, $noSpaceBodyPart . "_" . $noSpaceExerciseName);
	return $id;
}

function checkIfExist($id, $db)
{

	// checks if the exersise and part combo exists in database already or not.

	$checkExercise = "SELECT * FROM project_exercises_list where id = '$id'";
	$result = $db->query($checkExercise);
	if ($result->num_rows == 1) {
		return 1;
	}
	else {
		return 0;
	}
}

?>

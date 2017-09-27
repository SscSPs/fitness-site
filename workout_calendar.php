<?php
session_start();
if(isset($_SESSION['email']))
	{
		$_SESSION['message'] = '';
		$user = $_SESSION['email'];

		require 'commonFiles/getConnection.php';

		$result = $db->query("SELECT * FROM Project_Customer_details WHERE email = '$user'");

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc()){
				$name = $row["name"];
				$user_name = $row["name"];
				$user_dob = $row["dob"];
				$user_gender = $row["gender"];
			}
			$age = date("Y") - substr($user_dob,0,4);

			if(isset($_POST['cal_butt']))
			{
				$_SESSION['message'] = "<center>
				<table>
					<tr class='head'>
						<td>Week 1</td>
						<td>Week 2</td>
						<td>Week 3</td>
						<td>Week 4</td>
						<td>Week 5</td>
					</tr>";

				if($_POST['motive'] == "health")
				{
					$_SESSION['message'] .= "<tr>
						<td>
						<b>Full Body Workout</b><br>
						Workout 5 days a week, rest 2 days<br>
						<br>
						<b>2 sets each of: </b><br>
						5 push-ups<br>
						15 sit-ups<br>
						5kg dumb-bell curls(10 reps)<br>
						15 seconds plank<br>
						</td>

						<td>
						<b>Full Body Workout</b><br>
						Workout 5 days a week, rest 2 days<br>
						<br>
						<b>2 sets each of: </b><br>
						10 push-ups<br>
						25 sit-ups<br>
						5kg dumb-bell curls(20 reps)<br>
						30 seconds plank<br>
						</td>

						<td>
						<b>Muscle Specific Workout</b><br>
						Workout 5 days a week, rest 2 days<br>
						<br>
						<b>Day 1: Chest</b><br>
						2 sets each of: <br>
						15 push-ups<br>
						5kg Flat Barbell 2 reps<br>
						5kg Incline Barbell 2 reps<br>
						5kg Butterfly 2 reps<br>
						5kg Flat Bench Dumb-bell press 5 reps<br>
						5kg Pullover 5 reps<br>
						<br>
						<b>Day 2: Arms</b><br>
						5kg dumb-bell curls(15 reps one hand)<br>
						5kg dumb-bell hammer(15 reps one hand)<br>
						5kg Barbell-Curl(10 reps)<br>
						Close grip chin ups(to your capability)<br>
						2.5kg Dumb-bell Concentration(10 reps)<br>
						<br>
						<b>Day 3: Core and Legs</b><br>
						<b>Core:</b><br>
						30 Sit-ups<br>
						30 Crunches<br>
						30 Leg-Raise<br>
						20 Russian Twist<br>
						90 Second plank<br>
						<b>Legs:</b><br>
						10 Squats<br>
						5kg Dumb-bell Lunges(10 reps)<br>
						50kg Leg Press(10 reps)<br>
						<br>
						<b>Day 4: Shoulder</b><br>
						5kg Dumb-bell Standing Military Press(15 reps)<br>
						5kg Barbell push press(10 reps)<br>
						5kg Standing Dumb-bell raise(15 reps)<br>
						5kg Barbell Upright Row(10 reps)<br>
						<br>
						<b>Day 5: Back</b><br>
						Chin-ups(to your capability)<br>
						10kg Lat Pull Down(15 reps)<br>
						10kg Reverse Lat Pull Down(15 reps)<br>
						7.5kg 1 arm dumb-bell row(10 reps)<br>
						5kg Seated Row(10 reps)<br>
						</td>

						<td><b>Muscle Specific Workout</b><br>
						Workout 5 days a week, rest 2 days<br>
						<br>
						<b>Day 1: Chest</b><br>
						2 sets each of: <br>
						20 push-ups<br>
						5kg Flat Barbell 4 reps<br>
						5kg Incline Barbell 4 reps<br>
						5kg Butterfly 4 reps<br>
						5kg Flat Bench Dumb-bell press 10 reps<br>
						5kg Pullover 10 reps<br>
						<br>
						<b>Day 2: Arms</b><br>
						5kg dumb-bell curls(20 reps one hand)<br>
						5kg dumb-bell hammer(20 reps one hand)<br>
						5kg Barbell-Curl(15 reps)<br>
						Close grip chin ups(to your capability)<br>
						2.5kg Dumb-bell Concentration(15 reps)<br>
						<br>
						<b>Day 3: Core and Legs</b><br>
						<b>Core:</b><br>
						40 Sit-ups<br>
						40 Crunches<br>
						40 Leg-Raise<br>
						25 Russian Twist<br>
						120 Second plank<br>
						<b>Legs:</b><br>
						20 Squats<br>
						5kg Dumb-bell Lunges(15 reps)<br>
						50kg Leg Press(15 reps)<br>
						<br>
						<b>Day 4: Shoulder</b><br>
						5kg Dumb-bell Standing Military Press(20 reps)<br>
						5kg Barbell push press(15 reps)<br>
						5kg Standing Dumb-bell raise(20 reps)<br>
						5kg Barbell Upright Row(15 reps)<br>
						<br>
						<b>Day 5: Back</b><br>
						Chin-ups(to your capability)<br>
						10kg Lat Pull Down(20 reps)<br>
						10kg Reverse Lat Pull Down(20 reps)<br>
						7.5kg 1 arm dumb-bell row(15 reps)<br>
						5kg Seated Row(15 reps)<br></td>

						<td>Muscle Specific Workout</b><br>
						Workout 5 days a week, rest 2 days<br>
						<br>
						<b>Day 1: Chest</b><br>
						2 sets each of: <br>
						30 push-ups<br>
						10kg Flat Barbell 2 reps<br>
						10kg Incline Barbell 2 reps<br>
						10kg Butterfly 2 reps<br>
						10kg Flat Bench Dumb-bell press 5 reps<br>
						10kg Pullover 5 reps<br>
						<br>
						<b>Day 2: Arms</b><br>
						10kg dumb-bell curls(15 reps one hand)<br>
						10kg dumb-bell hammer(15 reps one hand)<br>
						10kg Barbell-Curl(10 reps)<br>
						Close grip chin ups(to your capability)<br>
						2.5kg Dumb-bell Concentration(10 reps)<br>
						<br>
						<b>Day 3: Core and Legs</b><br>
						<b>Core:</b><br>
						40 Sit-ups<br>
						40 Crunches<br>
						40 Leg-Raise<br>
						30 Russian Twist<br>
						120 Second plank<br>
						<b>Legs:</b><br>
						20 Squats<br>
						10kg Dumb-bell Lunges(10 reps)<br>
						75kg Leg Press(10 reps)<br>
						<br>
						<b>Day 4: Shoulder</b><br>
						10kg Dumb-bell Standing Military Press(15 reps)<br>
						10kg Barbell push press(10 reps)<br>
						10kg Standing Dumb-bell raise(15 reps)<br>
						10kg Barbell Upright Row(10 reps)<br>
						<br>
						<b>Day 5: Back</b><br>
						Chin-ups(to your capability)<br>
						15kg Lat Pull Down(15 reps)<br>
						15kg Reverse Lat Pull Down(15 reps)<br>
						10kg 1 arm dumb-bell row(10 reps)<br>
						10kg Seated Row(10 reps)</td>
					</tr>
				</table>
				</center>";

				header('location: calendar_table.php');
				}
			}
		}
	}
?>
<!DOCTYPE HTML>

<html>
	<meta charset="utf-8">

	<head>
		<script type="text/javascript" src="/js/index.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<script src="/js/jquery.maphilight.min.js"></script>
		<script src="/js/sahil.js"></script>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="/css/index.css" rel="stylesheet">
		<title>Workout Calendar - Fitness Central</title>

	</head>

	<body>
		<header id = 'header1'></header>

		<?php
			if(isset($_SESSION['email'])) echo "Logged in as: ".$name;
		?>

		<form method="post" action="workout_calendar.php" class="work_calendar">
			<center>

				<table>
					<tr>
						<td colspan="2" class="sub_head">Workout Calendar<hr></td>
					</tr>
					<tr>
						<td><label for="email" style="width:200px;display: inline-block;">Email address</label></td>
						<td><input type="text" name="email" id="email" placeholder="Email" <?php if(isset($_SESSION['email'])) echo "value=$user readonly" ?> required/><br></td>
					</tr>
					<tr>
						<td><label for="name" style="width:200px;display: inline-block;">Your Name</label></td>
						<td><input type="text" name="name" id="name" placeholder="Name" <?php if(isset($_SESSION['email'])) echo "value=$user_name readonly" ?> required/><br></td>
					</tr>
					<tr>
						<td><label for="dob" style="width:200px;display: inline-block;">Date of Birth</label></td>
						<td><input type="date" name="dob" id="dob" placeholder="DD/MM/YYYY" <?php if(isset($_SESSION['email'])) echo "value=$user_dob readonly" ?> required/><br></td>
					</tr>
					<tr>
						<td><label for="bmi" style="width:200px;display: inline-block;">Motive</label></td>
						<td>
							<select style="width:147px;" name="motive">
								<option value="nil"> </option>
								<option value="loose" name="loose" id="loose">Loose Weight</option>
								<option value="gain" name="gain" id="gain">Gain Muscle</option>
								<option value="health" name="health" id="health">Stay Healthy</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							  <label for="gender" style="display: inline-block;">Gender</label>
						</td>
						<td>
							  <input type="radio" name="gender" value="Male" <?php if(isset($_SESSION['email'])) if($user_gender == "Male") echo "checked='checked'" ?> />Male
							  <input type="radio" name="gender" value="Female" <?php if(isset($_SESSION['email'])) if($user_gender == "Female") echo "checked='checked'" ?> />Female
							  <input type="radio" name="gender" value="Other" <?php if(isset($_SESSION['email'])) if($user_gender == "Other") echo "checked='checked'" ?> />Other
						</td>
					</tr>
					<tr>
						<td colspan="2" class="butt"><input type="submit" name="cal_butt" value="Get Started ->" style="height: 40px; width: 170px;"/></td>
					</tr>

				</table>

			</center>

		</form>


		<script>

			<?php
				if(isset($_SESSION['email']))
				{
					echo "loadHeaderRegistered('header1');";
				}
				else echo "loadHeader('header1');";
			?>

		</script>
	</body>
</html>

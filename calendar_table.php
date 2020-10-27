<?php
	session_start();
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
		<title>Workout Calendar : Fitness Central</title>

		<style>
			table{
				border: 1px solid black;
				margin-top: 40px;
				margin-bottom: 40px;
			}
			td{
				padding-right: 10px;
				padding-left: 10px;
			}
			tr{
				border-bottom: 1px solid black;
				border-right-color: black;
				border-right-style: solid;
				border-right-width: 1px;
			}
			.head{
				color: coral;
			}
		</style>

	</head>

	<body>
		<header id = 'header1'></header>

		<?php
			if(isset($_SESSION['email']))
			{
				echo "Logged in as: ".$_SESSION['email'];
				echo $_SESSION['message'];
			}
		?>




		<script>

			<?php
				if(isset($_SESSION['email']))
				{
					echo "loadHeaderRegistered('header1');";
				}
				else {	
					echo "loadHeader('header1');"
				}
			?>

		</script>
	</body>
</html>

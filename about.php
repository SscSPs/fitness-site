<?php

  session_start();
  require 'commonFiles/getConnection.php';

?>
<!DOCTYPE html>
<html>

	<meta charset="utf-8">

	<head>
		<script type="text/javascript" src="/js/index.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<script src="/js/jquery.maphilight.min.js"></script>
		<script src="/js/sahil.js"></script>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="/css/index.css" rel="stylesheet">

		<title>About - Fitness Central</title>

	</head>

	<body>
		<!-- header area with navigation bar and the background image and name of the website
			Will be loaded by JS-->
		<header id='header1'>
		</header>

		<?php
			if (isset($_SESSION['email'])) echo "Logged in as: ".$_SESSION['message'];
		?>

		<H1>Hey there!</H1>
		<h2>About us</h2>
		<div>
			<p>We are 4 college students who started this site as a project work we needed to make during out college degree.</p>
		</div>
		<script>
			<?php
				if(isset($_SESSION['email']))
				{
					echo "loadHeaderRegistered('header1');";
				}
				else {
					echo "loadHeader('header1');";
				}
			?>
		</script>
	</body>

</html>

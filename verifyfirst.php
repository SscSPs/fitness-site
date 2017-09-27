<?php
session_start();

?>
<html>
	<meta charset="utf-8">

	<head>
		<script type="text/javascript" src="/js/index.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<script src="/js/jquery.maphilight.min.js"></script>
		<script src="/js/sahil.js"></script>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="/css/index.css" rel="stylesheet">
		<title>Login - Fitness Central</title>
	</head>

	<body>
		<header id='header1'></header>
		<h2>Sorry</h2>
		<div>
			<p>You need to verify that <?php echo $_SESSION['email'] ?> is your email first, please check your emails to verify your account.</p>
			<p>Verified? <a href = "/login.php">Click here</a> to login</p>
		</div>

		<script>
			loadHeader("header1");

		</script>
	</body>

</html>

<?php
require '/PHPMailer/PHPMailerAutoload.php';
session_start();
$link = "fitness-site/verification.php/?email=" . $_SESSION['email'] . "&id=" . md5($_SESSION['email']) . md5($_SESSION['user']);


$mail = new PHPMailer;

$mail->isSMTP();	// Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';	// Specify main and backup SMTP servers
$mail->SMTPAuth = true;	// Enable SMTP authentication
$mail->Username = 'fitness.site.example@gmail.com';	// SMTP username
$mail->Password = 'fitnessSit';	// SMTP password
$mail->SMTPSecure = 'tls';	// Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;

$mail->setFrom('Owners@fitness-site.com', 'Fitness-Site');
$mail->addAddress($_SESSION['email'], $_SESSION['user']);

$mail->addReplyTo('fitness.site.example@gmail.com', 'Fitness-Site');
$mail->isHTML(true);

$mail->Subject = 'Welcome to Fitness-Site';
$mail->Body	= "<h3>Hello " . $_SESSION['user'] . "</h3>, <br> Please click on the following link to vefrify your email <br>
				<a href='$link'><b>VERIFY EMAIL</b><a><br><br> Alternativly, You can copy this link and paste it in your address bar: <br>$link";
$mail->AltBody = "Hello " . $_SESSION['user'] . ", Please go to the following link(copy and paste in address bar) to vefrify your email \"$link\" (wihtout quotes)";

$mailsent = $mail->send();

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
		<title>Thank You - Fitness Central</title>
	</head>

	<body>
		<header id='header1'></header>

		<div>
			<center>
				<?php if($mailsent){
					echo "
					<h2>Verify Your Email Address</h2>
					<p>Thank you for registering with us, if your email address is correct, we will send you an email.<br>
					Please follow the instructions in the email to verify your email address</p>";
			}
			else {
				echo "<h2>We are sorry</h2>
				<p>There is some sort of technical difficulty, we will send you an email as soon as we can to verify your email address.</p>
				";
			}
			?>

				<p><a href="/login.php">Click here</a> to go to the Login Page.</p>
			</center>
		</div>

		<script>
			loadHeader("header1");
		</script>
	</body>

</html>

<?php
	if(session_status())
	{
		session_start();
		session_unset();
		session_destroy();
		session_start();
		$_SESSION['message'] = "You have successfully logged out.";
	}
	header("location: ./");
?>

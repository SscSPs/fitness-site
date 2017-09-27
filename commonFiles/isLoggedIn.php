<?php
	session_start();
	function isAuth(){
		if(isset($_SESSION['auth'])){
			if(isset($_SESSION['admin'])){
				return 2; //is an admin
			}
			return 1; //is a member
		}
	else return 0;  //not authenticated
	}

?>

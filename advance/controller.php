<?php
	error_reporting(0);
	session_start();

	if(isset($_POST['login'])){
		$email = $_POST['emailid'];
		$password = $_POST['password'];

		$_SESSION['email'] = $email;

		header('location:profile.php');

	}


	if(isset($_POST['register'])){
		echo "Register pr click hua hai";
	}

?>
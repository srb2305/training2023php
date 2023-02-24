<?php
	error_reporting(0);
	session_start();
	include('db.php');

	if(isset($_POST['loginbtn'])){
		$email = $_POST['emailid'];
		$password = $_POST['password'];

		$_SESSION['email'] = $email;

		header('location:profile.php');

	}


	if(isset($_POST['register'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$education = $_POST['education'];
		$password = md5($_POST['password']);

		$qry = "insert into `users` (`name`,`email`,`contact`,`education`,`password`) values ('$name','$email','$contact','$education','$password')";
		$insert = mysqli_query($con, $qry);
		if($insert){
			$msg =  "Inserted Successfully";
		}else{
			$msg = "Something went wrong";
		}
		header('location:registration.php?msg='.$msg);

	}

?>
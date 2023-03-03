<?php
	//error_reporting(0);
	session_start();
	include('db.php');

	if(isset($_POST['loginbtn'])){
		$email = $_POST['emailid'];
		$password = md5($_POST['password']);

		$qry = "SELECT * FROM `users` WHERE `email`='$email' and `password` = '$password'";
		$result = mysqli_query($con,$qry);
		;
		if($result->num_rows > 0){
			$data =	$result->fetch_assoc(); 
		 	//$data = mysqli_fetch_assoc($result);

			$type = $data['type'];
			$_SESSION['email'] = $email;
			
			if($type == 2){
				header('location:profile.php');
			}else{
				header('location:admin_profile.php');
			}
		}else{
			$msg = "Invalid credentials";
			header('location:login.php?msg='.$msg);
		}


	}


	if(isset($_POST['register'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$education = $_POST['education'];
		$password = !empty($_POST['password']) ? md5($_POST['password']) : '';

		$errorArry = [];

		if(empty($name)){
			$errorArry['name'] = 'Name is required';
		}
		if(empty($email)){
			$errorArry['email'] = 'Email is required';
		}
		if(empty($contact)){
			$errorArry['contact'] = 'contact is required';
		}
		if(empty($password)){
			$errorArry['password'] = 'password is required';
		}

		unset($_SESSION['error_ary']);
		if(empty($name) || empty($email) || empty($contact) || empty($password) ){
			$_SESSION['error_ary'] = $errorArry;
			$msg = "Please fill required fields";
			header('location:registration.php?error_msg='.$msg);
			die();
		}

		$contactLeng = strlen($contact);
		if( ($contactLeng < 10) ||  ($contactLeng > 15) ){
			$msg = "Contact number should be between 10-15 digits";
			header('location:registration.php?error_msg='.$msg);
			die();
		}

		$chkQry = "select * from `users` where `email`='$email'";
		$chkResult = mysqli_query($con, $chkQry);
		$count = $chkResult->num_rows;
		if($count > 0){
			$msg =  "Email already registerd, pls login or signin with diffrent mail";
			header('location:registration.php?error_msg='.$msg);
			die();
		}


		$qry = "insert into `users` (`name`,`email`,`contact`,`education`,`password`) values ('$name','$email','$contact','$education','$password')";

		$insert = mysqli_query($con, $qry);

		if($insert){
			$msg =  "Inserted Successfully";
		}else{
			$msg = "Something went wrong";
		}
		header('location:registration.php?msg='.$msg);
	}


	if(isset($_GET['user_delete_id'])){
		$id = $_GET['user_delete_id'];
		$qry = "delete from `users` where `id`=$id";
		$delete = mysqli_query($con, $qry);
		if($delete){
			$msg =  "Deleted Successfully";
		}else{
			$msg = "Something went wrong";
		}
		header('location:user_list.php?msg='.$msg);
	}

	if(isset($_POST['update_user'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$education = $_POST['education'];

		$qry = "update `users` set `name`='$name',`email`='$email',`contact`='$contact',`education`='$education' where `id`='$id'";
		$update = mysqli_query($con, $qry);
		if($update){
			$msg =  "Updated Successfully";
		}else{
			$msg = "Something went wrong";
		}
		header('location:user_list.php?msg='.$msg);
	}

?>
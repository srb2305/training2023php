<?php
	//error_reporting(0);
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
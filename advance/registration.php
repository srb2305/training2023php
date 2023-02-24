<?php  
//error_reporting(0);
include('menubar.php');
// include_once('menubar.php');

// require('menubar.php'); 
//require_once('menubar.php'); 
?>


<h1>Registration</h1>
<?php
error_reporting(0);
if($_GET['msg']){
	echo $_GET['msg'];
}
?>

<form action="controller.php" method="POST">
	Name : <input type="text" name="name"><br>
	Email: <input type="email" name="email"><br>
	Contact: <input type="number" name="contact"><br>
	Education: 
	<select name="education">
		<option value="be">BE</option>	
		<option value="btech">BTech</option>	
		<option value="bcom">BCom</option>	
		<option value="bca">BCA</option>	
		<option value="mca">MCA</option>	
	</select>
	<br>
	Password: <input type="password" name="password"><br>
	<input type="submit" name="register" value="Submit">
</form>

<?php include('footer.php'); ?>

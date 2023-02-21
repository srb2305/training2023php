<?php  include('menubar.php'); ?>

<h1>Login</h1>
<form action="controller.php" method="POST">
	Email : <input type="email" name="emailid"><br>
	Password: <input type="password" name="password"><br>
	<input type="submit" name="login" value="Login">
</form>




<?php include('footer.php'); ?>
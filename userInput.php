<h1>User Input</h1>

<form action="userInput.php" method="POST">
<input type="number" name="number1" placeholder="Enter number 1"><br>
<input type="number" name="number2" placeholder="Enter number 2"><br>
<input type="submit" name="submit" value="Submit">
</form>


<?php 
	error_reporting(0);
	$n1 = 10;
	$n2 = $_POST['number2'];

	echo "<br>number 1 is=>". $n1;
	echo "<br>number 2 is=>". $n2;
	echo "<br>Sum of 2 number =>". $n1 + $n2;
	echo "<br>Sum of 2 number =>". $n1 + $n2;
	echo "<br>Sub of 2 number =>". $n1 - $n2;
	echo "<br>Multi of 2 number =>". $n1 * $n2;
	echo "<br>Div of 2 number =>". $n1 / $n2;

?>



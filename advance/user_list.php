<h1>User List</h1>
<?php 
include('menubar.php');

include('db.php');
$qry = "select * from `users`";
$result = mysqli_query($con, $qry);
$totalCount = $result->num_rows;
//$myResult = $result->fetch_assoc(); // convert object to array
//$myResult = mysqli_fetch_assoc($result); // convert object to array
?>

<table border="1">
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Contact</th>
		<th>Delete</th>
	</thead>
	<tbody>

		<?php  foreach ($result as $key => $value) { ?>
		
			<tr>
				<td><?php  echo $value['id']; ?></td>
				<td><?php  echo $value['name']; ?></td>
				<td><?php  echo $value['email']; ?></td>
				<td><?php  echo $value['contact']; ?></td>
				<td>
					<a onClick="if(confirm('Are u sure?????')){return true}else{return false}" href="controller.php?user_delete_id=<?php  echo $value['id']; ?>">Delete</a>

					<a href="user_edit.php?id=<?php  echo $value['id']; ?>">Edit</a>
				</td>
			</tr>

		<?php } ?>
		
		
	</tbody>
</table>
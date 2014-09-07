<!DOCTYPE html>
<html>
<head>
<title>User</title>
</head>
<body>
	<h1 align="center">User</h1>
	<div align="center">
			<table border="1">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Username</th>
				</tr>
				<?php foreach ($user as $key=>$value){ ?>
				<tr>
					<td><?php echo $value->first_name; ?></td>
					<td><?php echo $value->last_name; ?></td>
					<td><?php echo $value->e_mail; ?></td>
					<td><?php echo $value->user_name; ?></td>
				</tr>
				<?php } ?>
			</table>
		
	</div>
</body>
</html>
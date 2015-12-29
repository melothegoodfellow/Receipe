<html>

<?php

	require_once('dbconnection.php');

	session_start();

	if(count($_POST)>0)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "select id,role from users where name='$username' and password='$password'";
		$getUsers = mysqli_query($conn,$query);
		
		$row = mysqli_fetch_array($getUsers);

		if(mysqli_num_rows($getUsers))
		{
			if(in_array('admin',$row))
			{
				$_SESSION['uID'] = $row['id'];
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['role'] = $row['role'];
				header("location:admin.php");
			}
			else
			{
				$_SESSION['uID'] = $row['id'];
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['role'] = $row['role'];
				header("location:receipe.php");
			}
		}
		
	}
?>

<head>

</head>

<body>

<!--"<?php //echo $_SERVER['PHP_SELF']; ?>"-->
	<form method="POST" action="">

		Login: </br>
		Username: <input type="text" name="username" />
		Password: <input type="text" name="password" /></br>
		<input type="submit" value="login" />
	</form>

</body>

</html>
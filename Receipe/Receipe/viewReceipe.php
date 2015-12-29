<?php

	session_start();
	require_once('dbconnection.php');

	echo "username ".$_SESSION['name']." logged in as ".$_SESSION['role']."</br>";

	$userId = $_SESSION['uID'];

	$receipeId = $_GET['id'];

	$query = "select * from receipes where id = '$receipeId'";

	$queryGetIngredients = "select i.name from ingredients i inner join receipesingredients r on i.id = r.ingId where r.rid = '$receipeId'";
	
	$getReceipe = mysqli_query($conn, $query);

	$getReceipeIngredients = mysqli_query($conn, $queryGetIngredients);

	if(count($getReceipe) > 0)
	{	
		$result = mysqli_fetch_array($getReceipe);
		
		echo "<b> Image: </b></br>";
		echo "<img src=".$result['imageName']." height='200px' width='200px' /> "."</br>";

		echo "<b> Receipe Name: </b></br>";
		echo $result['name']."</br>";
		
		echo "<b> Description: </b></br>";
		echo $result['description']."</br>";

		echo "<b> Ingredients: </b></br>";
		while($resultIngredients = mysqli_fetch_array($getReceipeIngredients))
		{
			echo $resultIngredients['name']."</br>";
		}

		echo "<b> Ratings: </b></br>";
		echo $result['rating']."</br>";

	}

	if(count($_POST) > 0)
	{
		$query = "insert into ratings(recId,uId) values ('$receipeId','$userId')";

		mysqli_query($conn,$query);

		$query = "update receipes SET rating=(select count(*) from ratings where recId = '$receipeId') WHERE id = '$receipeId'";

		mysqli_query($conn,$query);
	}
?>

<html>

	<head>

	</head>

	<body>

		<form method="POST">

			<input type="hidden" name="rating" value="<?php echo $userId; ?>">

			<?php 



				$query = "select * from ratings where uId = '$userId' and recID = '$receipeId'";

				$getUID = mysqli_query($conn, $query);
				
				if(mysqli_num_rows($getUID) || $_SESSION['role'] == 'admin')
				{
					?>
					<input type="submit" value="Rate" disabled/>
					<?php 
				}		
				else
				{
					?>
					<input type="submit" value="Rate"/>
					<?php

				}

			?>

		</form>

	</body>

</html>
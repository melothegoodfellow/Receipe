<?php

	session_start();

	echo "username ".$_SESSION['name']." logged in as ".$_SESSION['role']."</br>";

	require_once('dbconnection.php');

	$query = "select id,name from receipes";

	$getIngredients = mysqli_query($conn, $query);
	
	if(count($getIngredients) > 0)
	{	
		echo "<b>Receipes:</b></br>";
		while($result = mysqli_fetch_array($getIngredients))
		{
	?>
		
			<a href="viewReceipe.php?id=<?php echo $result['id']; ?>"> <?php echo $result['name']; ?> </a></br>
	
	<?php

		}
	}

	?>
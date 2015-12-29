<?php

	session_start();

	echo "username ".$_SESSION['name']." logged in as ".$_SESSION['role']."</br>";

	$userId = $_SESSION['uID'];

	require_once('dbconnection.php');

	if(isset($_POST)&&(sizeof($_POST)>0))
	{
		if(isset($_POST['ingredient']))
		{
			$ingredient = trim($_POST['ingredient']);

		//echo "ingre ".$ingredients;
			//var_dump($ingredient);
			$query = "insert into ingredients(name) values ('$ingredient')";

			mysqli_query($conn, $query);

		}
		else
		{
			$imageDir = "image/";
			$imageFileName = $imageDir.basename($_FILES['uploadImage']['name']);

			$isUpload = 1;

			$imageFileType = pathinfo($imageFileName,PATHINFO_EXTENSION);
			
			$getImageSize = getimagesize($_FILES['uploadImage']['tmp_name']);

			//if($check !== false)
			{

			}

			if(file_exists($imageFileName))
			{
				echo "Sory File already exists";
				$isUpload = 0;
			}

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
			{
				echo "Sorry only JPG, JPEG, PNG & GIF formats";
			}

			if($isUpload == 1)
			{
				if(move_uploaded_file($_FILES['uploadImage']['tmp_name'], $imageFileName))
				{
					echo "File upload success";
				}
				else
					echo "File upload failed";
			}
			else
				echo "Cant upload image";

			$receipeName = trim($_POST['receipe']);
			$receipeDes = trim($_POST['des']);
			//var_dump($_POST['des']);
			$ingredientsList = $_POST['ingredients'];

			echo "file name ".$imageFileName;

			$query = "insert into receipes (name,description,uid,imageName) values ('$receipeName','$receipeDes','$userId','$imageFileName')";

			mysqli_query($conn,$query);

			$receipeID = mysqli_insert_id($conn);

			foreach ($ingredientsList as $key => $value)
			{	
				$intVal = intval($value);
				$query = "insert into receipesingredients(rId, ingId, imageName) values ('$receipeID','$intVal', '$imageFileName')";
				mysqli_query($conn,$query);
			}
		}
	}

?>

<html>

	<head>

	</head>

	<script>



	</script>

	<body>
		<div>
			<?php

				$query = "select id,name from receipes where uid = $userId";

				$getIngredients = mysqli_query($conn, $query);
				if(count($getIngredients) > 0)
				{	
					echo "<b>Receipes By you</b></br>";
					while($result = mysqli_fetch_array($getIngredients))
					{
						?>

							<a href="viewReceipe.php?id=<?php echo $result['id']; ?>"> <?php echo $result['name']; ?> </a></br>

						<?php
					}
				}

			?>

		</div>
		<form method="POST" action="" enctype="multipart/form-data">
			<b> Receipe Name: </b></br>
			<input type="text" name="receipe" required pattern="[A-Za-z0-9 ]{1,}" title="Enter only characters or numbers"/></br>
			<b> Description: </b></br>
			<textarea name="des" required >
			</textarea>
		</br>
			<b> Ingredients: </b>
			
			<?php

				$query = "select * from ingredients";

				$getIngredients = mysqli_query($conn, $query);
				if(count($getIngredients) > 0)
				{
					while($result = mysqli_fetch_array($getIngredients))
					{
						?>
						
						
							</br> <input type="checkbox" name="ingredients[]" value="<?php echo $result['id']; ?>" id="<?php echo $result['id']; ?>" /> <?php echo $result['name']; ?> 
						
						
						<?php
					}
				}

			?>
		</br>
			<input type="file" name="uploadImage" id="uploadImageId">
			<input type="submit" value="Add Receipe" />
		</form>

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
			<b> Add ingredient: <b>
			<input type="text" name="ingredient" required pattern="[A-Za-z ]{1,}" title="Enter only characters"/>
			<input type="submit" value="add ingredient" />
		</form>
	</body>

</html>
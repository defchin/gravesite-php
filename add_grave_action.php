<?php
if (isset($_POST['submit'])) {
	if ($_POST['uploadKey'] === 'abc123') {
		$firstName = filter_input(INPUT_POST, 'firstName');
		$middleName = filter_input(INPUT_POST, 'middleName');
		$lastName = filter_input(INPUT_POST, 'lastName');
		$birthDate = filter_input(INPUT_POST, 'birthDate');
		$deathDate = filter_input(INPUT_POST, 'deathDate');

// Validate inputs
if ($firstName == null || $lastName == false ||
        $birthDate == null || $deathDate == null) {
    $error = "Invalid grave data. Check all fields and try again.";
    include('error.php');
} else {

$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// check if file already exists 
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 1000000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "JPG" && $imageFileType !="PNG" && $imageFileType != "JPEG" 
	&& $imageFileType != "GIF" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	//if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was no error uploading your file.";
		}
	}

    require_once('database.php');

	// Add the product to the database  
	$addNewGraveQuery = "INSERT INTO graves(PhotoName, firstName, middleName, lastName, birthDate, deathDate) VALUES ('{$target_file}', '{$firstName}', '{$middleName}', '{$lastName}', '{$birthDate}', '{$deathDate}')";
	$newGraveResult = mysqli_query($connection, $addNewGraveQuery);


	// Display the Product List page
	if ($newGraveResult) {
		header("Location: index.php");
		exit;
	} else {
		echo"Upload Failed";
		exit;
	}    
}

	} else {
		echo "Invalid Upload Key";
		exit;
	}
}
?>
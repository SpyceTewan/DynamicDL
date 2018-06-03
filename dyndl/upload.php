<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>

	<?php

	$cfg = simplexml_load_file("config.xml");

	$uploadable = false;

	if($cfg -> uploadable == "true"){
		$uploadable = true;
	}

	if($uploadable == true){
		$upload_dir = "../download" . $_POST["path"];
		$upload_file = $upload_dir . basename($_FILES["file"]["name"]);
	}
	?>

	<meta charset="utf-8">
	<link rel="icon" type="icon/png" href="assets/favicon.png">
	
	<link rel="stylesheet" type="text/css" href="dl.css">
	<script src="http://cdn.tewan.at/websetup.js"></script>
	<script src="http://cdn.tewan.at/jquery.js"></script>

	<style type="text/css">
		h1 {
			margin-top: 5%;
			margin-bottom: 1%;
		}
	</style>
</head>
<body>
	<center>
		<h1><?php if(move_uploaded_file($_FILES["file"]["tmp_name"], $upload_file)){
			echo "Upload successful!";
		}else {
			echo "Upload failed! Try again";
		} ?></h1>
		<a href="../dyndl.php" class="button-primary">Back</a>
	</center>
</body>
</html>
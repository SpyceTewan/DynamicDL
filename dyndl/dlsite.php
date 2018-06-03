<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="dl.css">
	<script src="http://cdn.tewan.at/websetup.js"></script>
	<script src="http://cdn.tewan.at/jquery.js"></script>

	<style type="text/css">
		.container {
			background-color: #4A4A4F;
			width: 30%;
			height: 35%;
			position: fixed;
			top: 30%;
			left: 35%;
			box-shadow: 0px 0px 10px grey;
			overflow: hidden;
			text-align: right;
		}

		.title-dl {
			font-size: 20px;
			color: white;

			margin-top: 5%;
		}

		.name {
			color: white;
			font-size: 30px;
			margin-bottom: 10%;
		}

		.dl {
			color: white;
			padding-left: 50px;
			padding-right: 50px;
			padding-top: 20px;
			padding-bottom: 20px;
			font-size: 30px;
		}

		
	</style>

	<?php 
		if(!empty($_GET['file'])){	// Checking if ?file= is given in url
			$path = $_GET['file'];	// Getting the path per url get request

			//Fixing XSS
			$path = str_replace('<', '&#60;', $path);
			$path = str_replace('>', '&#62;', $path);

			//Fixing security exploit that leads to the whole file system being browsable
			$path = str_replace('../', '/', $path);

			$path = "../" . $path;
		}else {	// Setting path to root directory if not given
			$path = "/";
		}

		$splits = explode("/", $path);
		$name = $splits[count($splits) - 1];
	?>
</head>
<body onload="fixBodyHeight()">
	<div class="container">
		<a href="../dyndl.php?path=<?php echo str_replace($name, "", str_replace('../download', "", $path)) ?>">
			<img src="assets/cancel.png" style="position: relative; right: 10px; top: 10px; width: 20px;">
		</a>

		<div style="text-align: center;">
			<p class="title-dl">You are about to download</p>
			<p class="name"><?php echo $name; ?></p>
			<a href="<?php echo $path; ?>" class="button-primary dl" download>Download</a>
		</div>
	</div>
</body>
</html>
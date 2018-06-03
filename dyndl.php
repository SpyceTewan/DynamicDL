<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="icon/png" href="dyndl/assets/favicon.png">
	
	<link rel="stylesheet" type="text/css" href="dyndl/dl.css">
	<script src="http://cdn.tewan.at/websetup.js"></script>
	<script src="http://cdn.tewan.at/jquery.js"></script>

	<?php include 'dyndl/init.php' ?>
	
	<title><?php echo $title; ?></title>
</head>
<body onload="fixBodyHeight()">
	<div class="header">
		<h1 class="header-title"><?php echo $title; ?></h1>

		<div class="header-path-container">

			<?php 
				$splits = explode("/", $path); 
				for ($i = 0; $i < count($splits) - 1; $i++) {
					$c_name = $splits[$i];
					$c_path = "dyndl.php?path=";
					for($j = 0; $j <= $i; $j++){
						$c_path .= $splits[$j] . "/";
					}

					if($c_name == ""){
						$c_name = "Root";
					}

					include 'dyndl/elem_path.php';
				}
			?>
		</div>
	</div>

	<div class="sidebar">
		<div class="sidebar-content">
			<?php if($uploadable){
				include 'dyndl/upload_elem.php';
			} ?>
		</div>

		<div class="sidebar-footer"><a href="dyndl/legal.php" target="_blank">© Stefan Heinz - 2018</a></div>
		
	</div>
	
	<div class="explorer">
		<table class="table-files">
			<tr>
				<th>Name</th>
				<th>Last Updated</th>
				<th>Size</th>
			</tr>
				<?php include 'dyndl/directories.php'; include 'dyndl/files.php' ?>
		</table>
	</div>

</body>
</html>
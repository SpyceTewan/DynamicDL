<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="dyndl/dl.css">

	<?php 
			$file_size_factor_label = array(
				0 => "Bytes",
				1 => "KB", 
				2 => "MB",
				3 => "GB",
			);


			if(!empty($_GET['path'])){	// Checking if ?path= is given in url
				$path = $_GET['path'];	// Getting the path per url get request

				//Fixing XSS
				$path = str_replace('<', '&#60;', $path);
				$path = str_replace('>', '&#62;', $path);

				//Fixing security exploit that leads to the whole file system being browsable
				$path = str_replace('../', '/', $path);

				$c = $_GET['c'];
			}else {	// Setting path to root directory if not given
				$path = "/";
				$c = "";
			}


			// Load the config.xml file
			$cfg = simplexml_load_file('dyndl/config.xml');

			//Initializing variables using the config data
			$title = $cfg -> title;
			$root_dir = $cfg -> root;
			$file_size_comma = pow(10, $cfg -> decimal_points);
			$file_size_factor = $cfg -> bytefactor;
			$file_size_factor = pow(1024, $file_size_factor);
			$current_dir = $root_dir . $path;

			//Scanning current directory
			$dl_filter = $current_dir . '*';
			$dl_files = scandir($current_dir, 1);
				
			if(glob($dl_filter)){
				$dl_count = count(glob($dl_filter));
			}else {
				$dl_count = 0;
			}
		
	 ?>
	 <title><?php echo $title; ?></title>
</head>
<body>
	<h1><?php echo $title; ?></h1>
	<p>Current directory: <?php echo $path; ?></p>
	<table class="table-directory">
		<tr>
			<th>Directory</th>
		</tr>

			<?php

				// Going to last directory
				$parent = str_replace($c, '', $path);
				include 'dyndl/parent_dir.php';

				for ($i = 0; $i < $dl_count; $i++) {
					$file_name = $dl_files[$i];
					if(is_dir($current_dir . $file_name)){
						$file_date = date('F d Y H:i:s.', filemtime($current_dir . $file_name));
						
						$file_size = round(filesize($current_dir . $dl_files[$i]) / (int) $file_size_factor * (int) $file_size_comma) / $file_size_comma;

						include 'dyndl/elem_dir.php';

					}
				}


			 ?>
		

	</table>
	
	<table class="table-files">
		<tr>
			<th>File</th>
			<th>Last Updated</th>
			<th>Size</th>
		</tr>
			<?php

				for ($i = 0; $i < $dl_count; $i++) {
					$file_name = $dl_files[$i];
					if(is_file($current_dir . $file_name)){
						$file_date = date('F d Y H:i:s.', filemtime($current_dir . $file_name));
						
						$file_size = round(filesize($current_dir . $dl_files[$i]) / $file_size_factor * $file_size_comma) / $file_size_comma;

						include 'dyndl/elem_file.php';

					}
				}
			 ?>
	</table>
</body>
</html>
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
	}else {	// Setting path to root directory if not given
		$path = "/";
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

	$uploadable = false;

	if($cfg -> uploadable == "true"){
		$uploadable = true;
	}

	//Scanning current directory
	$dl_filter = $current_dir . '*';
	$dl_files = scandir($current_dir, 1);
		
	if(glob($dl_filter)){
		$dl_count = count(glob($dl_filter));
	}else {
		$dl_count = 0;
	}
 ?>
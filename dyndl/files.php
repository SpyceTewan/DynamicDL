<?php
	for ($i = 0; $i < $dl_count; $i++) {
		$file_name = $dl_files[$i];
		
		if(is_file($current_dir . $file_name)){
			// Store file information
			$file_date = date('F d Y H:i:s.', filemtime($current_dir . $file_name));
			$file_size = round(filesize($current_dir . $dl_files[$i]) / $file_size_factor * $file_size_comma) / $file_size_comma;
			
			include 'elem_file.php';
		}
	}
?>
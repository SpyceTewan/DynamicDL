<div class="upload-container">
	<h3>Upload file</h3>
	<form action="dyndl/upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file" id="fileUpload" class="upload-input">
		<label for="fileUpload" class="button-primary">Browse File...</label>
		<input style="visibility: hidden; width: 0px; height: 0px" name="path" value="<?php echo $path; ?>">
		<input type="submit" name="submit" value="Upload" class="button-primary upload-submit">
	</form>
</div>
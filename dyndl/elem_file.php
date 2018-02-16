<tr>
	<td>
		<a href="<?php echo $current_dir . $file_name ?>" download><?php echo $file_name ?></a>
	</td>
	
	<td>
		<?php echo $file_date; ?>
	</td>
						
	<td> 
		<?php echo $file_size . ' ' . $file_size_factor_label[(int)$cfg -> bytefactor]; ?>
	</td>

</tr>
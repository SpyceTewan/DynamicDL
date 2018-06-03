<tr>
	<td class="explorer-name">
		<img src="dyndl/assets/file.png">
		<a href="dyndl/dlsite.php?file=<?php echo $current_dir . $file_name ?>"><?php echo $file_name ?></a>
	</td>
	
	<td class="explorer-date">
		<?php echo $file_date; ?>
	</td>
						
	<td class="explorer-size"> 
		<?php echo $file_size . ' ' . $file_size_factor_label[(int)$cfg -> bytefactor]; ?>
	</td>
</tr>
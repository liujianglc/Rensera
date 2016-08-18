<?php
if (!function_exists('return_file_type'))
{
	function return_file_type($file_type = NULL)
	{
		$new_file_type = '';
		if (stripos($file_type, 'image')!==FALSE) {
			$new_file_type = 'Image';
		} else if (stripos($file_type, 'doc')!==FALSE)  {
			$new_file_type = 'Article';
		} else if (stripos($file_type, 'pdf')!==FALSE) {
			$new_file_type = 'PDF';
		} 
		return $new_file_type;
	}
}
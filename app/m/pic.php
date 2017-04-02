<?php

echo scanDirectoryImages("media/gallery/");

function scanDirectoryImages($directory, array $exts = array('jpeg', 'jpg', 'gif', 'png'))
{
    if (substr($directory, -1) == '/') {
        $directory = substr($directory, 0, -1);
    }
	
    $html = '';
	$array = array();
    if (is_readable($directory) && file_exists($directory)) {
		$directoryList = opendir($directory);
		$index = 0;
		while (false !== ($file = readdir($directoryList))) {
			if ('.' === $file) continue;
			if ('..' === $file) continue;
			$path = $directory . '/' . $file;
			if (is_readable($path)) {
				$dimensionsText = "onload='this.width=" . "300" . "; this.height=" . "350" . ";'";
				//$html .= '<a href="' . $path . '"><img src="' . $path . '" style="max-height:150px;max-width:150px;" onmouseover="this.width='600'; this.height='600'" onmouseout="this.width='150'; this.height='150'"/></a>';
				$html = '<img src="' . $path . '" hspace="45" name="pic' . $index . '" ';
				//$array = ['' => $name, 'computedString' => $computedString];
				//array_push($array, $index);
				//echo json_encode($array);
				array_push($array, $html);
				
			}
			$index = $index + 1;
		}
	
		/*
		while($file = readdir($directoryList)) {
			if ($file != '.' && $file != '..') {
				$path = $directory . '/' . $file;
				if (is_readable($path)) {
					if (is_dir($path)) {
						return scanDirectoryImages($path, $exts);
					}
					if (is_file($path) && in_array(end(explode('.', end(explode('/', $path)))), $exts)) {
						echo $file;
						//$html .= '<a href="' . $path . '"><img src="' . $path
						//	. '" style="max-height:150px;max-width:150px;" onmouseover="this.width='600'; this.height='600'" onmouseout="this.width='150'; this.height='150'"/></a>';
					}
				}
			}
		}
		*/
        closedir($directoryList);
    }
    return json_encode($array);
}

?>
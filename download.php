<?php
	header('Content-type: text/html;charset=utf-8');
	$filename = $_GET['filename'];
	// $filename = 'Chrysanthemum.jpg';
	$filepath = dirname(__FILE__).'\\'.'images'.'\\'.$filename;
	$filesize = filesize($filepath);

	if(!file_exists($filepath)){
		echo '文件不存在';
		return ;
	}
	$fp = fopen($filepath, 'r');
	$filesize = filesize($filepath);

	$buffer = 1024;
	$filecount = 0;
	header('Content-type: application/octet-stream');
	header('Accept-Ranges: bytes');
	header('Accept-length:'.$filesize);
	header('Content-Disposition: attachment; filename='.$filename);
	while(!feof($fp) && $filecount<$filesize){
		$filecon = fread($fp, $buffer);
		$filecount += $buffer;
		echo $filecon;
	}
	fclose($fp);
?>
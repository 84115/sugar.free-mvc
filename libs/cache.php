<?php

class Cache{
	
	public static function read($dir, $file){
		$path = CACHE.'/'.$dir.'/'.$file;
		
		if(file_exists($path)){
			include($path);
		}
	}
	
	public static function write($dir, $file, $type, $data){
		if(isset($data)){
		
			if(!is_dir(CACHE.'/'.$dir)){
				mkdir(CACHE.'/'.$dir);
			}
		
			$path = CACHE.'/'.$dir.'/'.$file;
			$handle = fopen($path, $type) or die ('Error writing file. ['.$path.']');
			fwrite($handle, $data);
			fclose($handle);
		}
	}
	
}
<?php

class Log{

	private static $_handle;
	
	/*
	* @param string $data: ...
	* @param string $file: ...
	*/
	public static function write($data = null, $file = 'log.txt'){
		if(defined('LOG')){
		
			self::$_handle = fopen(APP.'/'.$file, 'a+');
			
			$date = date("m-d-Y g:ia");
			
			$contents = "[$date] $data\r\n";
			fwrite(self::$_handle, $contents);
			fclose(self::$_handle);
		}
	}
	
}
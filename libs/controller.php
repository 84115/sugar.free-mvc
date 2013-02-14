<?php

class Controller{

	function __construct(){
		$this->view = new View();
	}
	
	public function loadModel($name){
		
		$path = APP.'/'.MODEL.'/'.$name.'_'.MODEL.'.php';
		
		if (file_exists($path)){
			require $path;
			
			$modelName = $name . '_'.ucfirst(MODEL);
			$this->model = new $modelName();
		}
	}

}
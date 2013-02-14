<?php

class Bootstrapper{

	function __construct(){

		//Get the current page url & tidy it up!
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		
		if (empty($url[0])){
			$url[0] = 'index';
		}
		
		if (!file_exists(APP.'/'.CONTROLLER.'/'.$url[0].'_'.CONTROLLER.'.php')){
			$this->error();
		}
		
		//load mvc
		if (isset($url[0])){
			
			$file = APP.'/'.CONTROLLER.'/'.$url[0].'_'.CONTROLLER.'.php';
			if (file_exists($file)){
				require $file;
			}
			else{
				$this->error();
			}

			//init
			$controller = new $url[0];
			$controller->loadModel($url[0]);
			
		}
		
		if(isset($url[2])){
			if(method_exists($controller, $url[1])){
				$controller->{$url[1]}($url[2]);
			}
			else{
				$this->error();
			}
		}
		else{
			if(isset($url[1])){
				if (method_exists($controller, $url[1])){
					$controller->{$url[1]}();
				}
				else{
					$this->error();
				}
			}
			else{
				$controller->index();
			}
		}

	}
	
	function error(){
		header('Location: '.URL.'/error');
		exit;
	}
	
}
<?php

class Api extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function getUser($id = null){
		if(isset($id) && ctype_digit($id)){
			echo $this->model->getUser($id);
		}
		elseif(isset($id)){
			echo $this->model->getError(420);
		}
		else{
			echo $this->model->getError();
		}
	}
	
	public function getFeed($id = null){
		echo $this->model->getFeed($id);
	}

	//check if item is not on list, then return to 131
	public function getError($id = 131){
		print_r( $this->model->getError($id) );
	}
	
	public function keytest(){
		$this->view->vars = [
			"xhr" => URL."/api/getFeed/"
		];
		$this->view->render('api', 'keytest');
	}

	public function documentation(){
		$this->view->vars = [
			"xhr1" => URL."/api/listFunctions/",
			"xhr2" => URL."/api/getError/all"
		];
		$this->view->render('api', 'documentation');
	}
	
	public function listFunctions(){
		
		$class = get_class_methods($this);
		$new = [];
		
		foreach($class as $id => $name){
			if(strpos($class[$id],'get') !== false){
				$new[] = URL.'/'.strtolower(get_class($this)).'/'.$class[$id];
			}
		}
		
		//print_r($new);
		echo json_encode($new, JSON_PRETTY_PRINT);
	}
	
	public function index(){
		$this->view->render('index', 'index');
	}
	
}
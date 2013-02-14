<?php

class Index extends Controller{

	public function __construct(){
		parent::__construct();
		//$this->view->js = ['index/js/script.js'];
	}
	
	public function index(){
		$this->view->render('index', 'index');
	}
	
	public function alt(){
		$this->view->render('index', 'index');
	}
	
	public function test(){
		Cache::write('directory', 'myfilename', 'w+', 'LOREM');
	}
	
}
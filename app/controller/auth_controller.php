<?php

class Auth extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index() {	
		$this->view->render('auth', 'index');
	}

	public function login(){
		$this->model->login();
	}
	
	public function logout(){
		$this->model->logout();
	}
	
}

?>
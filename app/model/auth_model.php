<?php

class Auth_model extends model{
	public function __construct(){
		parent::__construct();
	}

	public function login(){
		$sth = $this->db->prepare("SELECT id, role FROM user WHERE login = :login AND password = :password");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
		));
		
		$data = $sth->fetch();
		
		$count =  $sth->rowCount();
		if ($count > 0){

			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			header('location: '.URL);
		}
		else{
			header('location: '.URL);
		}
	
	}

	public static function checkPermission($array){
		if(Session::get('loggedIn') !== true || !in_array($array)){
			$this->logout();
		}
	}
	
	public static function logout(){
		Session::init();
		session_destroy();
		header('location: '.URL);
		exit;
	}

}
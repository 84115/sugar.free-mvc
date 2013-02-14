<?php

class Api_Model extends Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getUser($id){
		$result = $this->db->select("SELECT id,login,role FROM user WHERE id = $id");
		
		header('Content-type: application/json');
		return json_encode($result[0], JSON_PRETTY_PRINT);
	}
	
	public function getFeed($id){
		if(isset($id)){
			$id = "WHERE id = $id";
		}
		
		$result = $this->db->select("SELECT * FROM blog $id");
		
		header('Content-type: application/json');
		return json_encode($result, JSON_PRETTY_PRINT);
	}
	
	public function getError($id = 131){
		header('Content-type: application/json');
		
		if($id === "all"){
			$result = $this->db->select("SELECT * FROM api_errors");
			return json_encode($result, JSON_PRETTY_PRINT);
		}
		else{
			$result = $this->db->select("SELECT * FROM api_errors WHERE id = $id");
			return json_encode($result[0], JSON_PRETTY_PRINT);
		}
	}
	
}
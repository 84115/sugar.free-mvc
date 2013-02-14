<?php

class Database extends PDO{
	
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
	}
	
	/*
	 * @param string $sql: ...
	 * @param array $array: ...
	 * @param int $fetchMode: By default this will return an associative array
	 * @return: array
	 */		
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value){
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}

	/*
	 * @param string $table: The table you want to select data from
	 * @param array $data: The data to turn into an SQL friendly string
	 * @return: array
	 */	
	public function insert($table, $data){
		
		ksort($data);
		
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();
	}

	/*
	 * @param string $table: The table you want to update data from
	 * @param array $data: ...
	 * @param int $where: ...
	 */		
	public function update($table, $data, $where){
		ksort($data);
		
		$fieldDetails = NULL;
		foreach($data as $key=> $value){
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		foreach ($data as $key => $value){
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();
	}

	/*
	 * @param string $table: The table you want to delete data from
	 * @param array $where: ...
	 * @param int $limit: The maximum amount of items you want to be able to delete
	 */		
	public function delete($table, $where, $limit = 1){
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
	
}
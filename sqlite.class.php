<?php

class SQLite {
	public $file;
	public $db;
	public $query;
	public $prepare;
	//
	const IS_INT = 1;
	const IS_STR = 2;
	const ASSOC = 1;
	const NUM = 2;
	const BOTH = 3;

	function __construct($base, $mode = 0666, $auto = true) {
		$this->db_file = $base;
		//
		return $auto?$this->open($mode):true;
	}
	
	function open($mode) {
		if($this->db) return $this->db;
		//
		if(!$this->db_file) return FALSE;
		//
		if(!is_file($this->db_file)) return FALSE;
		//
		if($this->db = sqlite_open ($this->db_file, $mode, $error)) {
			//
			return $this->db;
		}
		else{
			$this->error($error);
			return FALSE;
		}
	}
	
	function close() {
		$this->error = '';
		sqlite_close($this->db);
		return true;
    }	
	
	function query($query) {
		$query = preg_replace("/escape_string\((.*?)\)/", $this->escape_string("$1"), $query);
		$this->query = sqlite_query($this->db, $query);
		return $this;
	}
	
	function fetch($type=SQLITE_BOTH) {
		if($type == 1) {
			$type = SQLITE_ASSOC;
		}
		elseif($type == 2) {
			$type = SQLITE_NUM;
		}
		elseif($type == 3 || $type != SQLITE_BOTH) {
			$type = SQLITE_BOTH;
		}
		//
		return sqlite_fetch_array($this->query, $type);
	}	
	
	function fetchAll($type=SQLITE_BOTH) {
		if($type == 1) {
			$type = SQLITE_ASSOC;
		}
		elseif($type == 2) {
			$type = SQLITE_NUM;
		}
		elseif($type == 3 || $type != SQLITE_BOTH) {
			$type = SQLITE_BOTH;
		}
		//
		return sqlite_fetch_all($this->query, $type);
	}	
	
	
	function prepare($query) {
		$this->prepare = $query;
		return $this;
	}
	
	function bindParam($bind, $value, $types = '') {
		//
		if($types == 1) {
			if(preg_match("/^\d+$/", $value)) $to_prepare = $value;
		}
		elseif($types == 2) {
			if(is_string($value)) $to_prepare = '"'.$this->escape_string($value).'"';
		}
		elseif(!empty($types)) {
			if(preg_match($types, $value)) '"'.$this->escape_string($value).'"';
		}
		//
		if(empty($to_prepare)) $to_prepare = '""';
		
		//
		$this->prepare = str_replace($bind, $to_prepare, $this->prepare);
		//
		return $this;
	}
	
	function execute() {
		//
		$this->query = sqlite_query($this->db, $this->prepare);
		return $this;
	}
	
	function last_insert_id() {
		return sqlite_last_insert_rowid ($this->db);
	}	
	
	function rows() {
		return sqlite_num_rows($this->query);
	}
	
	function getColumns($table) {
		return $this->query("PRAGMA table_info($table)")->fetchAll(SQLite::ASSOC);
	}
	
	function getTables() {
		return $this->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name")->fetchAll(SQLite::ASSOC);
	}
	
	function escape_string($string, $quotestyle='both') {

		if( function_exists('sqlite_escape_string') ){
			$string = sqlite_escape_string($string);
			$string = str_replace("''","'",$string); #- no quote escaped so will work like with no sqlite_escape_string available
		}
		else{
			$escapes = array("\x00", "\x0a", "\x0d", "\x1a", "\x09","\\");
			$replace = array('\0',   '\n',    '\r',   '\Z' , '\t',  "\\\\");
		}
		switch(strtolower($quotestyle)){
			case 'double':
			case 'd':
			case '"':
				$escapes[] = '"';
				$replace[] = '\"';
				break;
			case 'single':
			case 's':
			case "'":
				$escapes[] = "'";
				$replace[] = "''";
				break;
			case 'both':
			case 'b':
			case '"\'':
			case '\'"':
				$escapes[] = '"';
				$replace[] = '\"';
				$escapes[] = "'";
				$replace[] = "''";
				break;
		}
		return str_replace($escapes,$replace,$string);
	} 
	
	function error($error) {	
		if(!$this->db) {
			return '[ERROR] No Db Handler'; 
		}
		if(empty($error)) {
			return sqlite_last_error ($this->db);
		}
		return $error;
	}
}
?>

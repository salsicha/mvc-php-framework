<?php
include_once ROOT_DIR.'/php/model/orm.php';

class Model extends ORM {
	public function __construct() {
		$this->connect();
	}	

	public function _create() {		
	}

	public function _read() {
	}
	
	public function _update() {
	}
	
	public function _delete() {
	}
}
?>
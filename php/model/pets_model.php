<?php
class Pet extends Model {
	public $id;
	public $name;
	
	public function _create() {
	}
	
	public function _read($id) {
		$query = $this->read($id, 'pets', 'name');
		$this->id = $query[0];		
		$this->name = $query[1];
	}
	
	public function _update() {
	}
	
	public function _delete() {
	}	
}

?>
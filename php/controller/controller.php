<?php
include_once ROOT_DIR.'/php/model/model.php';
include_once ROOT_DIR.'/php/model/pets_model.php';

class controller {
	protected $object_globals;
	
	public function __construct() {
	}
		
	public function _post() {
	}
	
	public function _get() {
		$pet_object = new Pet();
		$pet_object->_read(1);
		$this->object_globals = array('pet_name'=>$pet_object->name);
		$file = '/php/view/home_view.html';
		echo $this->include_html($file, $object_globals);
	}
	
	public function _put() {
	}
	
	public function _delete() {
	}
	
	protected function include_html($file, $object_globals) {
		$subject = file_get_contents(ROOT_DIR.$file);
		
		if ($this->object_globals != '') {
			foreach ($this->object_globals as $key => $value) {
				$key = '[['.$key.']]';
				$file_string = str_replace($key, $value, $subject);
			}
		}
		return $file_string;
	}
}
?>
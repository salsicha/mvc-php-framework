<?php
include_once ROOT_DIR.'/php/controller/controller.php';
include_once ROOT_DIR.'/php/model/pets_model.php';

class pets_controller extends controller {
	protected $object_globals;
		
	public function __construct() {
	}
	
	public function _post() {
	}
	
	public function _get() {
		$parameter_array = explode("_", $_GET['divid']);
		$model_name = $parameter_array[0];
		$id = $parameter_array[1];
		$pet_object = new Pet();
		$pet_object->_read($id);
		$this->object_globals = array('pet_id'=>$pet_object->id, 'pet_name'=>$pet_object->name);
		$file = '/php/view/pets_element_view.html';
		echo $this->include_html($file, $object_globals);
	}
	
	public function _put() {
	}
	
	public function _delete() {
	}
}
?>
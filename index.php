<?php
define('ROOT_DIR', __DIR__);

$controller = isset($_GET['controller']) ? $_GET['controller'].'_controller' : 'controller';
include_once ROOT_DIR.'/php/controller/'.$controller.'.php';
$control_inst = new $controller;

switch($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		$control_inst->_post();
		break;
	case 'GET':
		$control_inst->_get();
		break;
	case 'PUT':
		$control_inst->_put();
		break;
	case 'DELETE':
		$control_inst->_delete();
		break;
}
?>
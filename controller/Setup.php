<?php
use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;


class SetupController extends \Tuanduimao\Loader\Controller {
	
	function __construct() {
	}



	function install() {
		$customer = App::M('customer');
		$source = App::M('source');
		$task = App::M('task');
		$config = App::M('config');
		
		try {
			$source->dropTable();
			$customer->dropTable();
			$task->dropTable();
			$config->dropTable(); 
		}catch( Excp $e) {

			echo $e->toJSON();
			return;

		}
	
		$source = App::M('source');
		$customer = App::M('customer');
		$task = App::M('task');
		$config = App::M('config');
		
		try  {
			$source->__schema();
			$task->__schema();
			$customer->__schema();
			$config->__schema();
			$config->default();
		}catch ( Excp $e ) {
			echo $e->toJSON();
			return;
		}


		echo json_encode('ok');
	}



	function upgrade(){
		echo json_encode('ok');	
	}

	function repair() {

		$cust = App::M('Customer');
		try  {
			$cust->__schema();
		}catch ( Excp $e ) {
			echo $e->toJSON();
			return;
		}

		echo json_encode('ok');		
	}


	function uninstall() {
	
		$customer = App::M('customer');
		$source = App::M('source');
		$config = App::M('config');
		$task = App::M('task');

		try  {
			$source->__clear();
			$customer->__clear();
			$task->__clear();
			$config->__clear();
		}catch ( Excp $e ) {
			echo $e->toJSON();
			return;
		}


		echo json_encode('ok');		
	}
	
}
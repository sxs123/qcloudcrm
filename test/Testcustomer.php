<?php 

define('SEROOT', getenv('SEROOT') );
define('TROOT', getenv('TROOT') );
define('CWD', getenv('CWD') );
define('APP_ROOT', getenv('APP_ROOT') );

require_once( SEROOT . "/loader/Autoload.php" );


use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;

class testCustomer extends PHPUnit_Framework_TestCase {
		/**
		 * 测试创建表
		 * @return [type] [description]
		 */
		function test__schema() {
			$csr = App::M("Customer");
			$csr->__schema();
			$columns = $csr->getColumns();
			$this->assertEquals( in_array('address', $columns), true );
		}

		/**
		 * 添加程序
		 * @return [type] [description]
		 */
		function testCreate() {
			$csr = App::M("Customer");
			$resp = $csr->create([
			"id" => 1024,
			"company" => "tuanduimao",
			"name" => "test",
			"title" => "test",
			"email" => "maoshun@diancloud.com",
			"mobile" => "13431113828",
			"remark" => "testcontent",
			"status" => "active"
			]);
			$this->assertEquals( $resp['id'],1024);
		}

}


 ?>
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
	function testCreate() {
		$config = App::M('config');
		$ys = App::M("Yunsou",$config->getvalue('marking'));
		$resp = $ys->create([

				[
				'content'=>'test',
				'key'=>'1',
				'id'=>'1',
				'customerid'=>'1',
				'isdelete'=>'0',
				'createat'=>'1',
				'uname'=>'tuanduimao',
				'uid'=>'1'
				]
			]);
		$this->assertEquals( $resp['code'], 0 );
	}

	/**
	 *yunsou ser
	 * 注意只有存在内容存在test  并且customerid=1 可以
	 * @return [type] [description]
	 */
	function testSearch() {

		$config = App::M('config');
		$ys = App::M("Yunsou",$config->getvalue('marking'));
		$key = $ys->search('test',['num'=>"[N:customerid:1:1]"],'1','1');
		$this->assertEquals( $resp['code'], 0 );
	}
}


 ?>
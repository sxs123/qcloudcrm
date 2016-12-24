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
use \Tuanduimao\Tuan as Tuan;




/**
 * ！注意接口url
 * 追踪api测试	
 */
class TestTrackingAPI extends PHPUnit_Framework_TestCase {

		function testCreate() {


			$tuan = new Tuan;
			$resp = $tuan->call('/apps/qcloudcrm/Tracking/create',[],[
				[
					"customerid"=>"10",
					"oid" => rand('1','100'),
					"oname" => "注册",
					"content" => "用户帐号注册成功",
					"key" => "tuanduimao",
					"isdelete"=>"1",
					"createat"=>date('Y-m-d'),
					"id"=>rand('1','100')
				],
		
			]);

			$this->assertEquals($resp['retcode'], 0 );	


		}

	
}








 ?>
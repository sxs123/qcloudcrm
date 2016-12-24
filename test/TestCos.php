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
 * cos测试
 */

class TestCos extends PHPUnit_Framework_TestCase {

	function testUpload() {	
		$config = App::M('config');
		$cos = App::M("Cos",$config->getvalue('cos'));
		$resp = $cos->uploadByUrl('http://pic33.nipic.com/20130916/3420027_192919547000_2.jpg',['filetype'=>'jpg']);
		$this->assertEquals( $resp['code'],0);
	}


	/**
	 * 必须文件存在
	 * 文件删除test
	 * @return [type] [description]
	 */
	function testRemove() {	

			$config = App::M('config');
			$cos = App::M("Cos",$config->getvalue('cos'));
			$resp = $cos->remove('2826335962.jpg');
			$this->assertEquals( $resp['code'],0);
	}


}



?>
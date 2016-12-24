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


class TestSourceModel extends PHPUnit_Framework_TestCase  {

		// cdn上传
		function testUploadImages() {

			$Source = App::M("Source");

			$markdown =  $Source->uploadImages('![](http://pic33.nipic.com/20130916/3420027_192919547000_2.jpg)');
			$pos = strpos( $markdown, "myqcloud.com");
			$this->assertNotEquals( $pos, false );

		}

		// 缓存测试
		function testHtml(){
			$src = App::M("Source");
			$src->html("test", "<b>HELLO WORLD</b>");
			$this->assertEquals( $src->html("test"), "<b>HELLO WORLD</b>" );

		}



}




 ?>
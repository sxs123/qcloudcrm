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

/**
 *注意手机号
 * 信息测试
 */
class TestSms extends PHPUnit_Framework_TestCase {



	function testSend() {

		$config = App::M('config');
		$Sms = App::M("sms",$config->getvalue('sms'));
		$resp = $Sms->send('18263721737',"尊敬的客户张三您好！您的白金会员卡已生效，请在3天内激活，感谢合作和支持。");

		$this->assertEquals($resp['result'],0);



	}




}



 ?>
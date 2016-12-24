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
 * youtu测试	
 */
class Testyoutu extends PHPUnit_Framework_TestCase {

	/**
	 * 上传测试
	 * @return [type] [description]
	 */
	function testUpload() {
		$config = App::M('config');
		$yt = App::M("Youtu",$config->getvalue('youtu'));
		$test = file_get_contents('http://4493bz.1985t.com/uploads/allimg/150127/4-15012G52133.jpg');
		$resp = $yt->update($test,'test.jpg');
		$this->assertEquals($resp['code'],0);
	}

	/**
	 * 名片识别测试
	 * @return [type] [description]
	 * 图片必须为名片并且大小不得超过500m
	 */
	function testOcr() {
		$config = App::M('config');
		$yt = App::M("Youtu",$config->getvalue('youtu'));
		$test = file_get_contents('http://pic.58pic.com/58pic/12/49/04/80k58PICzYP.jpg',true);
		$resp = $yt->update($test,'test.jpg');
		$namecard = $yt->ocr($resp['data']['download_url']);
		$this->assertEquals($namecard['0'],0);
	}






}

?>
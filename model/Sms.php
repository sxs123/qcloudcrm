<?php 

use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Loader\App as App;


// 短信发送
class SmsModel {


	/**
	 * 初始化
	 * @param array $param [description]
	 */
	function __construct( $opt=[] ) {
		$this->AppID = isset($opt['AppID']) ? $opt['AppID'] : "";
		$this->AppKey = isset($opt['AppKey']) ? $opt['AppKey'] : "";
	}


	function sign( $mobile ) {	
		$config = App::M('config');
		$AppKey = $config->getvalue('sms')['AppKey'];
		return md5( "{$AppKey}{$mobile}");

	}

	/**
	 * 发送短信文本
	 * @param  [type] $mobile  [description]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	function send( $mobile, $content ){
		$sig=$this->sign($mobile);
		$config = App::M('config');
		$datames = $config->getvalue('sms');
		$resp = Utils::Req(
		     "POST", 
		     "https://yun.tim.qq.com/v3/tlssmssvr/sendsms",
		     [
		         "type" => "json",
		         "datatype"=>"json",
		         //"debug"=>true,
		         "header" => [
		         	"Content-Type: application/json"
		         ],
		         "query" => [
		         	"random"=> rand(100000,999999),
		         	"sdkappid" =>$datames["AppID"] 
		         ],
		         "data" =>[

		            "tel" => [
		                 "nationcode" => "86",
		                 "phone" => "$mobile"
		            ],
		            "type" => "0",
		             "sign" => "云课堂测试",
		           	  "msg" => $content,
		            "sig" => $sig,
		            "extend" => "",
		            "ext" => ""
		         ]
		     ]
		 );
		$resp['tel'] = $mobile;
		return $resp;
	}
	


	/**
	 * 发送语音短信
	 * @param  [type] $mobile  [description]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	function sendvoice( $mobile, $content ){
		$sig=$this->sign($mobile);
		$config = App::M('config');
		$datasms = $config->getvalue('sms');
		$resp = Utils::Req(
			"POST",
			"https://yun.tim.qq.com/v3/tlsvoicesvr/sendvoiceprompt",
			[
				"type" => "json",
				"datatype"=>"json",
				"query" => [
					"sdkappid" => $datasms['appId'] ,
					"random" => rand(1,999999999)
				],
				"data" =>[
					"tel" => [
					"nationcode" => "86",
					"phone" =>$mobile,
					],
					"prompttype" => "2",
					"promptfile"=> $content,
					"sig" => $sig,
					"ext" => ""
				]
			]
		);

		$resp['tel'] = $mobile;
		return $resp;
	}


	/**
	 *生成id随机数
	 * @return [type] [description]
	 */
	function generateId( $length ) {
    	// 随机数字符集，可任意添加你需要的字符
    	$chars = '1234567890';
	    $num = '';
	    for ( $i = 0; $i < $length; $i++ ) 
	    {
	      
	        $num .= $chars[ mt_rand(0, strlen($chars) - 1) ];
	    }

	    return date(time()).$num;
	}




}


 ?>
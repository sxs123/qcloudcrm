<?php 

use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;


// 发送接口
class TaskDaemonController extends \Tuanduimao\Loader\Controller {
	
	// 发送信息
	function  sendsms(){

		// 实例化
		$task = App::M('task');

		// 查询
		$data= $task->query()
		->orderBy('created_at','asc')
		->where("push_at",">=",date('Y-m-d',time()))
		->where("status","=","pending")
		->where("type","=","sms")
		->get()
		->toArray();
		// 循环执行
		foreach ($data as $ts ) {

			$task->sendSMS($ts['_id']);

		}
	}

	// 发送邮件
	function   sendmail(){
		// 实例化
		$task = App::M('task');
		// 查询
		$data= $task->query()
		->orderBy('created_at','asc')
		->where("push_at",">=",date('Y-m-d',time()))
		->where("status","=","pending")
		->where("type","=","mail")
		->get()
		->toArray();
		// 循环执行
		foreach ($data as $ts ) {

			$task->sendEmail($ts['_id']);

		}
	}


}






 ?>
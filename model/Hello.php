<?php

use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;

/**
 * 客户检索model
 */

class HelloModel extends Model {

	/**
	 * 初始化
	 * @param array $param [description]
	 */
	function __construct( $param=[] ) {
		parent::__construct();
		$this->table('hello');
	}
	
	/**
	 * 数据表结构
	 * @see https://laravel.com/docs/5.3/migrations#creating-columns
	 * @return [type] [description]
	 */
	function __schema() {
			
			$this->putColumn( 'name', $this->type('string', ['length'=>20, 'defaut'=>'world']) )
			     ->putColumn( 'mobile', $this->type('string',  ['length'=>100, 'index'=>1]) )
		;
	}


	function __clear() {
		$this->dropTable();
	}
	

	/**
	 * 创建测试数据
	 * @return [type] [description]
	 */
	function fakerdata(){
		
		$faker = Utils::faker();
		for( $i=0; $i<10; $i++ ) {
			try {
				$this->create([
			        'name'=> $faker->name,
			        'mobile'=> $faker->phoneNumber,
			    ]);
			} catch(Excp $e){}
	    }
	}


}
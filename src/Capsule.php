<?php namespace Buchin\Indodata;
use Illuminate\Database\Capsule\Manager as CapsuleManager;
/**
* Capsule
*/
class Capsule extends CapsuleManager
{
	function __construct()
	{
		parent::__construct();
		$this->addConnection([
			'driver' => 'sqlite',
			'database' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'suburban_town_province_indonesia.sqlite',
			'prefix' => ''
			]);

		$this->setAsGlobal();
		$this->bootEloquent();
	}
}
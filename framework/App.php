<?php
namespace framework;

use framework\core\DI;
use framework\component\DB;
use framework\core\Config;

final class App
{
	private $appRoot;

	public function _construct($appRoot)
	{
		$this->appRoot = $appRoot;
	}

	public function run()
	{
		$this->initDI();

		$controller = ucfirst($_GET['c']).'Controller';
		$action = $_GET['a'].'Action';

		$className = '\app\controllers\\'.$controller;

		(new $className())->$action();
	}

	public function initDI()
	{
		DI::set('db', function () {
			return $this->diDb();
		});

		DI::set('config', function () {
			return $this->diConfig();
		});
	}

	public function diDb() 
	{
		return DB::getInstance();
	}

	public function diConfig()
	{
		$config = new Config(ROOT_PATH.'application/src/config/config.default.php');
		$config->merge(ROOT_PATH.'application/src/config/config.local.php');

		return $config->get();
	}


}